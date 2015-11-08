<?php

namespace SF2wDDD\Domain\Model\User;

interface UserRepository
{
    /**
     * Provides an id for registering a new User
     *
     * @return UserIdentity
     */
    function nextIdentity();

    /**
     * @param User $user
     * @return void
     */
    function add(User $user);

    /**
     * @param UserIdentity $userIdentity
     * @return User
     */
    function findOne(UserIdentity $userIdentity);

    /**
     * @param UserIdentity $userIdentity
     * @return void
     */
    function remove(UserIdentity $userIdentity);
}