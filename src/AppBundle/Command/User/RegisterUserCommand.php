<?php

namespace SF2wDDD\AppBundle\Command\User;

use SF2wDDD\AppBundle\Command\CommandAbstract;
use SF2wDDD\Common\Model\Base\ObjectCollection;
use SF2wDDD\Common\Model\Email;
use SF2wDDD\Common\Model\Password;
use SF2wDDD\Domain\Model\User\UserIdentity;
use SF2wDDD\Domain\Model\User\UserRole;

final class RegisterUserCommand extends CommandAbstract
{
    /** @var UserIdentity */
    private $userId;

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
        UserIdentity $userId,
        $username,
        $fullName,
        UserRole $role,
        Password $password,
        Email $email = null,
        ObjectCollection $telephones = null
    ) {
        $this->userId = $userId;
        $this->username = $username;
        $this->fullName = $fullName;
        $this->role = $role;
        $this->password = $password;
        $this->email = $email;
        $this->telephones = $telephones;
    }

    /** @return UserIdentity */
    public function userId()
    {
        return $this->userId;
    }

    /** @return string */
    public function username()
    {
        return $this->username;
    }

    /** @return string */
    public function fullName()
    {
        return $this->fullName;
    }

    /** @return UserRole */
    public function role()
    {
        return $this->role;
    }

    /** @return Password */
    public function password()
    {
        return $this->password;
    }

    /** @return Email */
    public function email()
    {
        return $this->email;
    }

    /** @return ObjectCollection */
    public function telephones()
    {
        return $this->telephones;
    }

    /**
     * {@inheritdoc}
     */
    protected function checkForErrors()
    {
    }
}