<?php

namespace SF2wDDD\Common\Validator;

use SF2wDDD\Common\Model\Base\ObjectCollection;

interface Validator
{
    /**
     * Validates supplied input then returns TRUE or FALSE.
     *
     * @param $input
     * @param string|int $errorIndex If validation fails, will be used as the index in the errors collection.
     * @return bool
     */
    function validate($input, $errorIndex = null);

    /**
     * Error(s) informing the reason(s) why validation failed.
     *
     * @return ObjectCollection Collection of <<Error>> objects
     */
    function validationErrors();
}