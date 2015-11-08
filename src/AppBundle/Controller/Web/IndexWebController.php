<?php

namespace SF2wDDD\AppBundle\Controller\Web;

use SF2wDDD\AppBundle\Controller\WebController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SF2wDDD\AppBundle\Resources\AppRegistry;
use SF2wDDD\AppBundle\Service\Store\UserAppService;

class IndexWebController extends WebController
{
    /**
     * @Method("GET")
     * @Route("/",
     *      name="app_index",
     *      options={"expose"=true}
     * )
     */
    public function indexAction()
    {
        /** @var UserAppService $userService */
        $userService = AppRegistry::get(AppRegistry::USER_SERVICE);
        $response = $userService->userRegistrationPage();
        return $this->fromTemplateResponse($response);
    }
}