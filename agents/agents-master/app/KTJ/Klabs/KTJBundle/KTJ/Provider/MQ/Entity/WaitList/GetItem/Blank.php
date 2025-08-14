<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;

/**
 * Class Blank
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class Blank
{
    /**
     * @var null|PassengerInfo $PassengerInfo
     */
    protected $PassengerInfo;
    /**
     * @var null|PassengerDiscountCardInfo $PassengerInfo
     */
    protected $PassengerDiscountCardInfo;

    /**
     * @return PassengerInfo|null
     */
    public function getPassengerInfo(): ?PassengerInfo
    {
        return $this->PassengerInfo;
    }

    /**
     * @param PassengerInfo|null $PassengerInfo
     * @return Blank
     */
    public function setPassengerInfo(?PassengerInfo $PassengerInfo): Blank
    {
        $this->PassengerInfo = $PassengerInfo;

        return $this;
    }

    /**
     * @return PassengerDiscountCardInfo|null
     */
    public function getPassengerDiscountCardInfo(): ?PassengerDiscountCardInfo
    {
        return $this->PassengerDiscountCardInfo;
    }

    /**
     * @param PassengerDiscountCardInfo|null $PassengerDiscountCardInfo
     * @return Blank
     */
    public function setPassengerDiscountCardInfo(?PassengerDiscountCardInfo $PassengerDiscountCardInfo): Blank
    {
        $this->PassengerDiscountCardInfo = $PassengerDiscountCardInfo;

        return $this;
    }


}
