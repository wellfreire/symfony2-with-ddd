<?php

namespace SF2wDDD\AppBundle\Response;

use SF2wDDD\Common\Validator\ValidationError;

class ApiResponseMessage
{
    private static $messages = array(
        ValidationError::INVALID_EMAIL => "The supplied e-mail address is not valid.",
    );

    /**
     * @param $errorCode
     * @return string|null
     */
    public static function messageForError($errorCode)
    {
        return isset(self::$messages[$errorCode]) ? self::$messages[$errorCode] : null;
    }
}