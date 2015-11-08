<?php

namespace SF2wDDD\Common\Validator;

use SF2wDDD\Common\Model\Base\Error;
use SF2wDDD\Common\Model\Base\ObjectCollection;

abstract class ValidatorAbstract implements Validator
{
    /** @var ObjectCollection */
    protected $validationErrors;

    public function __construct()
    {
        $this->validationErrors = new ObjectCollection();
    }

    /**
     * @inheritdoc
     */
    public function validationErrors()
    {
        return $this->validationErrors;
    }

    /**
     * @param Error $error
     * @param string|int $errorIndex
     */
    protected function addError($error, $errorIndex = null)
    {
        $this->validationErrors->add($error, $errorIndex);
    }
}