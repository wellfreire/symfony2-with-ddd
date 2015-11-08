<?php

namespace SF2wDDD\AppBundle\Service\Store;

use SF2wDDD\AppBundle\Request\RequestValidator;
use SF2wDDD\AppBundle\Request\User\UserAppRequest;
use SF2wDDD\AppBundle\Service\AppService;
use SF2wDDD\AppBundle\Presentation\Component\Breadcrumb;
use SF2wDDD\AppBundle\Presentation\TemplateConfig;
use SF2wDDD\AppBundle\Presentation\TemplateResponse;
use SF2wDDD\Common\Validator\EmailValidator;
use SF2wDDD\Domain\Model\User\UserRepository;

final class UserAppService extends AppService
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function userRegistrationPage()
    {
        $usersConfig = TemplateConfig::moduleConfig(TemplateConfig::MODULE_USERS);
        $breadcrumb = new Breadcrumb();
        $breadcrumb->setBaseSegment($usersConfig['label']);
        $breadcrumb->setActiveSegment('');
        $templateParams = array(
            'breadcrumb' => $breadcrumb,
            'module' => $usersConfig,
        );
        return new TemplateResponse('template/path/register_user.html.twig', $templateParams);
    }

    public function registerUserAdmin(UserAppRequest $request)
    {
        $requestValidator = new RequestValidator($request);
        $requestValidator->addValidation("email", new EmailValidator());
        // @todo: add other necessary validations
        $requestValidator->validate();
        if (! $requestValidator->validationErrors()->isEmpty()) {
            return $this->errorResponse($requestValidator->validationErrors());
        }

        $userAdminId = $this->userRepository->nextIdentity();
        $registerCommand = $request->commandForRegisterNewUser($userAdminId);
        $responseContent = array(
            "admin_user_id" => (string) $userAdminId,
        );
        return $this->handleCommand($registerCommand, $responseContent);
    }
}