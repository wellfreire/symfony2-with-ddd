<?php

namespace SF2wDDD\Common\Model;

use SF2wDDD\Common\Model\Base;
use SF2wDDD\Common\Validator\EmailValidator;

final class Email extends Base\ValueObject
{
    /** @var string */
    private $address;

    public function __construct($address)
    {
        $this->setAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Base\ValueObject $anEmail)
    {
        return (
            $anEmail instanceof Email &&
            strcmp($this->address(), $anEmail->address()) === 0
        );
    }

    /**
     * @return string
     */
    public function address()
    {
        return $this->address;
    }

    public function __toString()
    {
        return $this->address();
    }

    private function setAddress($address)
    {
        if (! $this->isAddressValid($address)) {
            throw new \InvalidArgumentException("Supplied e-mail address is not valid.");
        }
        $this->address = $address;
    }

    private function isAddressValid($address)
    {
        return (new EmailValidator())->validate($address);
    }
}