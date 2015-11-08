<?php

namespace SF2wDDD\Common\Model;

use SF2wDDD\Common\Model\Base;

final class Password extends Base\ValueObject
{
    /** @var string */
    private $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Base\ValueObject $aPassword)
    {
        return (
            $aPassword instanceof Password &&
            strcmp($this->password(), $aPassword->password()) === 0
        );
    }

    /**
     * @return string
     */
    public function password()
    {
        return $this->password;
    }

    public function __toString()
    {
        return $this->password();
    }
}