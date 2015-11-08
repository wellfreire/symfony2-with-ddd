<?php

namespace SF2wDDD\Infrastructure\Persistence\Repository\User;

use SF2wDDD\Common\Model\Base\ObjectCollection;
use SF2wDDD\Domain\Model\User\User;
use SF2wDDD\Domain\Model\User\UserIdentity;
use SF2wDDD\Domain\Model\User\UserRepository;

final class InMemoryUserRepository implements UserRepository
{
    /** @var ObjectCollection */
    private $users;

    function __construct()
    {
        $this->users = new ObjectCollection();
    }

    /**
     * @inheritdoc
     */
    public function nextIdentity()
    {
        return new UserIdentity(uniqid());
    }

    /**
     * @inheritdoc
     */
    function add(User $user)
    {
        $this->users->add($user, $user->identity()->id());
    }

    /**
     * @inheritdoc
     */
    function remove(UserIdentity $userIdentity)
    {
        $this->users->remove($userIdentity);
    }

    /**
     * @param UserIdentity $userIdentity
     * @return User|null
     */
    function findOne(UserIdentity $userIdentity)
    {
        return $this->users->get($userIdentity->id());
    }
}