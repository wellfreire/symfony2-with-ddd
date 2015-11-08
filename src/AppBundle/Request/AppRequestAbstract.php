<?php

namespace SF2wDDD\AppBundle\Request;

abstract class AppRequestAbstract implements AppRequest
{
    /**
     * Returns the array of request data indexed by param's names
     */
    abstract protected function requestData();

    public function param($paramName)
    {
        if (isset($this->requestData()[$paramName])) {
            return $this->requestData()[$paramName];
        }
        return null;
    }
}