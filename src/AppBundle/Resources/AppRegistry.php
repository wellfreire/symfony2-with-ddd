<?php

namespace SF2wDDD\AppBundle\Resources;

use Symfony\Component\DependencyInjection\ContainerInterface;

final class AppRegistry
{
    const USER_SERVICE = 'user.app_service';

    /** @var ContainerInterface */
    private static $container;

    public static function get($serviceIdentifier)
    {
        return self::$container->get($serviceIdentifier);
    }

    /**
     * @param ContainerInterface $container
     */
    public static function setServiceContainer(ContainerInterface $container)
    {
        self::$container = $container;
    }
}