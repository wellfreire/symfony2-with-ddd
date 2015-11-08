<?php

namespace SF2wDDD\AppBundle\Command;

use SF2wDDD\Common\Model\Base\Error;
use SF2wDDD\Common\Model\Base\ObjectCollection;

abstract class CommandAbstract implements CommandInterface
{
    /**
     * @var ObjectCollection
     */
    protected $errors;

    /**
     * Performs a self-validation and sets error 
     * messages if any error was found
     */
    abstract protected function checkForErrors();

    /**
     * {@inheritdoc}
     */
    public function hasErrors()
    {
        if (! isset($this->errors)) {
            $this->errors = new ObjectCollection();
            $this->checkForErrors();
        }
        if (! $this->errors->isEmpty()) {
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function listOfErrors()
    {
        return $this->errors->readOnlyCopy();
    }

    protected function addError($errorCode, $errorMessage)
    {
        if (! isset($this->errors)) {
            $this->errors = new ObjectCollection();
        }
        $this->errors->add(new Error($errorCode, $errorMessage));
    }
}