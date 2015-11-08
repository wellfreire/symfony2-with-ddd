<?php

namespace SF2wDDD\Common\Validator;

use SF2wDDD\Common\Model\Base\Error;
use Respect\Validation\Validator;

class EmailValidator extends ValidatorAbstract
{
    /**
     * @inheritdoc
     *
     * @param $emailAddress
     */
    public function validate($input, $errorIndex = null)
    {
        if (! Validator::email()->validate($input)) {
            $this->addError(
                new Error(ValidationError::INVALID_EMAIL, "The supplied email is invalid."),
                $errorIndex
            );
            return false;
        }
        return true;
    }
}