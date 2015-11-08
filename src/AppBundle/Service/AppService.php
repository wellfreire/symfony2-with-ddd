<?php

namespace SF2wDDD\AppBundle\Service;

use SF2wDDD\AppBundle\Command\CommandInterface;
use SF2wDDD\AppBundle\Command\CommandBus;
use SF2wDDD\Common\Model\Base\ObjectCollection;

class AppService
{
    private $commandBus;

    protected function errorResponse(ObjectCollection $errorMessages)
    {
        $apiServiceResponse = new AppServiceResponse();
        $apiServiceResponse->addErrors($errorMessages);
        return $apiServiceResponse;
    }

    protected function handleCommand(CommandInterface $command, $responseContent)
    {
        if (! $command->hasErrors()) {
            $this->commandBus()->handle($command);
            return $this->successResponseFromCommand($command, $responseContent);
        }
        return $this->errorResponseFromCommand($command);
    }

    private function successResponseFromCommand(CommandInterface $command, $responseContent) 
    {
        $apiServiceResponse = new AppServiceResponse();
        $apiServiceResponse->setData($responseContent);
        return $apiServiceResponse;
    }

    private function errorResponseFromCommand(CommandInterface $command)
    {
        return $this->errorResponse($command->listOfErrors());
    }

    private function commandBus()
    {
        if (! isset($this->commandBus)) {
            $this->commandBus = new CommandBus();
        }
        return $this->commandBus;
    }
}
