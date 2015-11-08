<?php

namespace SF2wDDD\Common\Model;

use SF2wDDD\Common\Model\Base;

final class Telephone extends Base\ValueObject
{
    const TYPE_RESIDENTIAL = "residential";
    const TYPE_MOBILE = "mobile";
    const TYPE_COMMERCIAL = "commercial";

    /** @var string */
    private $type;

    /** @var string */
    private $number;

    /**
     * @param string $type Telephone::TYPE
     * @param string $number
     */
    public function __construct($type, $number)
    {
        $this->type = $type;
        $this->number = $number;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Base\ValueObject $aTelephone)
    {
        return (
            $aTelephone instanceof Telephone &&
            strcmp($this->type(), $aTelephone->type()) === 0 && 
            strcmp($this->number(), $aTelephone->number()) === 0
        );
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function number()
    {
        return $this->number;
    }

    public function __toString()
    {
        return sprintf("%s (%s)", $this->number(), $this->type());
    }
}