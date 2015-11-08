<?php

namespace SF2wDDD\AppBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SF2wDDD\AppBundle\Controller\ApiController;
use SF2wDDD\AppBundle\Request\User\UserAppRequest;
use SF2wDDD\AppBundle\Resources\AppRegistry;
use SF2wDDD\AppBundle\Service\Store\UserAppService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserApiController extends ApiController
{
    /**
     * @Method("POST")
     * @Route("/api/users",
     *      name="api_users_new",
     *      options={"expose"=true}
     * )
     */
    public function newUserAction(Request $request)
    {
        $this->request = $request;
        /** @var UserAppService $userService */
        $userService = AppRegistry::get(AppRegistry::USER_SERVICE);
        $serviceResponse = $userService->registerUserAdmin(new UserAppRequest($this->requestData()));
        return $this->answerFromServiceResponse($serviceResponse);
    }
}
