<?php

namespace SF2wDDD\AppBundle\Service;

use SF2wDDD\AppBundle\Response\ApiResponseMessage;
use SF2wDDD\Common\Model\Base\Error;
use SF2wDDD\Common\Model\Base\ObjectCollection;

final class AppServiceResponse
{
    /** @var mixed */
    private $responseData;

    /** @var ObjectCollection */
    private $errors;

    public function isSuccess()
    {
        if (isset($this->errors)) {
            return $this->errors->isEmpty();
        }
        return true;
    }

    public function setData($responseData)
    {
        $this->responseData = $responseData;
    }

    public function data()
    {
        return $this->responseData;
    }

    public function addErrors(ObjectCollection $errors)
    {
        $this->errors = $errors;
    }

    public function errorsAsArray()
    {
        $errorsList = [];
        $this->errors->iterateTask(function ($errorId, Error $error) use (&$errorsList)
        {
            $apiErrorMessage = ApiResponseMessage::messageForError($error->code());
            if (! empty($apiErrorMessage)) {
                $errorsList[$errorId] = $apiErrorMessage;
            }
        });
        return $errorsList;
    }
}