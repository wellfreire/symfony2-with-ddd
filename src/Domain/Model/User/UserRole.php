<?php

namespace SF2wDDD\Domain\Model\User;

final class UserRole
{
    const ADMIN = "admin";

    /** @var string */
    private $currentRole;

    public function __construct($role)
    {
        $this->currentRole = $role;
    }
}