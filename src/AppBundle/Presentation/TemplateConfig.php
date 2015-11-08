<?php

namespace SF2wDDD\AppBundle\Presentation;

final class TemplateConfig
{
    const MODULE_USERS = 'users';

    public static function globalConfig()
    {
        return array();
    }

    public static function moduleConfig($moduleName)
    {
        $moduleConfig = array(
            self::MODULE_USERS => array(),
        );
        return $moduleConfig[$moduleName];
    }
} 