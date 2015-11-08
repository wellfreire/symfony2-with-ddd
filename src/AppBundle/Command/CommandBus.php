<?php

namespace SF2wDDD\AppBundle\Command;

class CommandBus
{
    /** @var CommandInterface */
    private $command;

    /** @var CommandHandlerInterface */
    private $commandHandler;

    public function handle(CommandInterface $command)
    {
        if (! $command->hasErrors()) {
            $this->command = $command;
            $this->resolveHandler();
            $this->executeCommand();
        }
    }

    private function resolveHandler()
    {
        $commandClassName = get_class($this->command);
        $handler = $commandClassName . "Handler";
        if (! class_exists($handler)) {
            throw new \RunTimeException("A [{$handler}] class should exist 
                in order to be able to handle [{$commandClassName}] command.");
        }
        $this->commandHandler = new $handler();
    }

    private function executeCommand()
    {
        $this->commandHandler->execute($this->command);
    }
}
