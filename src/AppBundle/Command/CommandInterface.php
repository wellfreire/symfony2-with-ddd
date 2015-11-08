<?php

namespace SF2wDDD\AppBundle\Command;

interface CommandInterface
{
    /**
     * Checks whether the Command has errors which
     * could prevent its successful execution
     *
     * @param void
     * @return boolean
     */
    function hasErrors();

    /**
     * Returns a Collection of Errors for the current Command
     *
     * @param void
     * @return \SF2wDDD\Common\Model\Base\ObjectCollection
     */
    function listOfErrors();
}