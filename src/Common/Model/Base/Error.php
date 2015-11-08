<?php

namespace SF2wDDD\Common\Model\Base;

final class Error
{
    /** @var mixed */
    private $code;

    /** @var string */
    private $message;

    public function __construct($errorCode, $errorMessage)
    {
        $this->code = $errorCode;
        $this->message = $errorMessage;
    }

    /**
     * @return mixed
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    public function __toString()
    {
        return $this->message();
    }
}
