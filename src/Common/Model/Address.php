<?php

namespace SF2wDDD\Common\Model;

use SF2wDDD\Common\Model\Base;

final class Address extends Base\ValueObject
{
    /** @var string */
    private $street;

    /** @var string */
    private $streetNumber;

    /** @var Postcode */
    private $postcode;

    /** @var string */
    private $city;

    /** @var string */
    private $stateCode;

    /** @var string */
    private $neighbourhood;

    /** @var string */
    private $complement;

    public function __construct(
        $street,
        $streetNumber,
        Postcode $postcode,
        $city,
        $stateCode,
        $neighbourhood = null,
        $complement = null
    ) {
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->postcode = $postcode;
        $this->city = $city;
        $this->stateCode = $stateCode;
        $this->neighbourhood = $neighbourhood;
        $this->complement = $complement;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Base\ValueObject $anAddress)
    {
        return (
            $anAddress instanceof Address && 
            strcasecmp($this->street(), $anAddress->street()) === 0 && 
            strcasecmp($this->streetNumber(), $anAddress->streetNumber()) === 0 && 
            $this->postcode->equals($anAddress->postcode()) && 
            strcasecmp($this->city(), $anAddress->city()) === 0 && 
            strcasecmp($this->stateCode(), $anAddress->stateCode()) === 0 && 
            strcasecmp($this->neighbourhood(), $anAddress->neighbourhood()) === 0 && 
            strcasecmp($this->complement(), $anAddress->complement()) === 0
        );
    }

    /**
     * @return string
     */
    public function street()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function streetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @return Postcode
     */
    public function postcode()
    {
        return $this->postcode;
    }

    /**
     * @return string
     */
    public function city()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function stateCode()
    {
        return $this->stateCode;
    }

    /**
     * @return string
     */
    public function neighbourhood()
    {
        return $this->neighbourhood;
    }

    /**
     * @return string
     */
    public function complement()
    {
        return $this->complement;
    }

    public function __toString()
    {
        $complement = empty($this->complement()) ? "" : " - " . $this->complement();
        $neighbourhood = empty($this->neighbourhood()) ? "" : " - " . $this->neighbourhood();
        return sprintf(
            "%s, %s%s%s\n%s - %s - %s", 
            $this->street(),
            $this->streetNumber(),
            $complement,
            $neighbourhood,
            $this->city(),
            $this->stateCode()
        );
    }
}