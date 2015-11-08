<?php

namespace SF2wDDD\AppBundle\Command;

interface CommandHandlerInterface
{
    /**
     * Executes the supplied Command
     *
     * @param CommandInterface $command
     * @return void
     */
    function execute(CommandInterface $command);
}