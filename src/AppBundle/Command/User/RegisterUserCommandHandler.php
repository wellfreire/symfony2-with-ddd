<?php

namespace SF2wDDD\AppBundle\Command\User;

use SF2wDDD\AppBundle\Command\CommandHandlerInterface;
use SF2wDDD\AppBundle\Command\CommandInterface;
use SF2wDDD\AppBundle\Resources\AppRegistry;
use SF2wDDD\Domain\Model\User\User;
use SF2wDDD\Domain\Model\User\UserRepository;

final class RegisterUserCommandHandler implements CommandHandlerInterface
{
    /**
     * {@inheritdoc}
     * @var RegisterUserCommand $registerCommand
     */
    public function execute(CommandInterface $registerCommand)
    {
        $user = new User(
            $registerCommand->userId(),
            $registerCommand->username(),
            $registerCommand->fullName(),
            $registerCommand->role(),
            $registerCommand->password(),
            $registerCommand->email(),
            $registerCommand->telephones()
        );
        /** @var UserRepository $userRepository */
        $userRepository = AppRegistry::get(AppRegistry::REPOSITORY_USER);
        $userRepository->add($user);
    }
}