<?php

namespace SF2wDDD\Domain\Model\User;

use SF2wDDD\Common\Model\Base\ObjectCollection;
use SF2wDDD\Common\Model\Email;
use SF2wDDD\Common\Model\Password;
use SF2wDDD\Domain\Model\User\UserIdentity;
use SF2wDDD\Domain\Model\User\UserRole;

final class User
{
    /** @var UserIdentity */
    private $identity;

    /** @var string */
    private $username;

    /** @var string */
    private $fullName;

    /** @var UserRole */
    private $role;

    /** @var Password */
    private $password;

    /** @var Email */
    private $email;

    /** @var ObjectCollection */
    private $telephones;

    public function __construct(
        UserIdentity $identity,
        $username,
        $fullName,
        UserRole $role,
        Password $password,
        Email $email = null,
        ObjectCollection $telephones = null
    ) {
        $this->identity = $identity;
        $this->username = $username;
        $this->fullName = $fullName;
        $this->role = $role;
        $this->password = $password;
        $this->email = $email;
        $this->telephones = $telephones;
    }

    /**
     * @return UserIdentity
     */
    public function identity()
    {
        return $this->identity;
    }

    /**
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->fullName;
    }

    /**
     * @return UserRole
     */
    public function role()
    {
        return $this->role;
    }

    /**
     * @return Password
     */
    public function password()
    {
        return $this->password;
    }

    /**
     * @return Email
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return ObjectCollection
     */
    public function telephones()
    {
        return $this->telephones;
    }
}