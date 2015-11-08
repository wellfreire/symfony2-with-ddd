<?php

namespace SF2wDDD\Common\Model\Base;

abstract class ValueObject
{
    /**
     * Checks whether a given V.O. equals to the current one
     * 
     * @param ValueObject
     * @return boolean
     */
    abstract public function equals(ValueObject $valueObject);
}