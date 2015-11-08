<?php

namespace SF2wDDD\Domain\Model\User;

use SF2wDDD\Common\Model\Base;

final class UserIdentity extends Base\ValueObject
{
    /** @var string $id */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Base\ValueObject $anUserId)
    {
        return (
            $anUserId instanceof UserIdentity &&
            strcmp($this->id(), $anUserId->id()) === 0
        );
    }

    /**
     * {@inheritdoc}
     */
    public function id()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id();
    }
}