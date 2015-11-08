<?php

namespace SF2wDDD\AppBundle\Controller;

use SF2wDDD\AppBundle\Resources\AppRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BaseController extends SymfonyController
{
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        AppRegistry::setServiceContainer($this->container);
    }
}