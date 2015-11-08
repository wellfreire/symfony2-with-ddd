<?php

namespace SF2wDDD\AppBundle\Request\User;

use SF2wDDD\AppBundle\Command\User\RegisterUserCommand;
use SF2wDDD\AppBundle\Request\AppRequestAbstract;
use SF2wDDD\Common\Model\Base\ObjectCollection;
use SF2wDDD\Common\Model\Email;
use SF2wDDD\Common\Model\Password;
use SF2wDDD\Domain\Model\User\UserIdentity;
use SF2wDDD\Domain\Model\User\UserRole;

final class UserAppRequest extends AppRequestAbstract
{
    /** @var array */
    private $requestData;

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    public function commandForRegisterNewUser(UserIdentity $userId)
    {
        return new RegisterUserCommand(
            $userId,
            $this->param("username"),
            $this->param("full_name"),
            new UserRole(UserRole::ADMIN),
            new Password($this->param("password")),
            new Email($this->param("email")),
            $this->telephonesFromRequest()
        );
    }

    /**
     * @inheritdoc
     */
    protected function requestData()
    {
        return $this->requestData;
    }

    private function telephonesFromRequest()
    {
        return new ObjectCollection();
    }
}