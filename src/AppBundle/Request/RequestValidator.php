<?php

namespace SF2wDDD\AppBundle\Request;

use SF2wDDD\Common\Model\Base\ObjectCollection;
use SF2wDDD\Common\Validator\Validator;

final class RequestValidator
{
    /** @var ObjectCollection */
    private $validators;

    /** @var ObjectCollection */
    private $validationErrors;

    /** @var AppRequest */
    private $request;

    public function __construct(AppRequest $request)
    {
        $this->request = $request;
        $this->validators = new ObjectCollection();
        $this->validationErrors = new ObjectCollection();
    }

    public function addValidation($requestParam, Validator $validator)
    {
        $this->validators->add($validator, $requestParam);
    }

    public function validate()
    {
        $this->validators->iterateTask(function ($paramName, Validator $validator)
        {
            if (! $validator->validate($this->request->param($paramName), $paramName)) {
                $this->validationErrors->merge($validator->validationErrors());
            }
        });
    }

    public function validationErrors()
    {
        return $this->validationErrors;
    }
}