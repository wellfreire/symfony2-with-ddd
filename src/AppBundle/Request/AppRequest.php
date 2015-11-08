<?php

namespace SF2wDDD\AppBundle\Request;

interface AppRequest
{
    /**
     * Retrieves the value of the supplied param name
     *
     * @param string $paramName
     * @return mixed
     */
    function param($paramName);
}