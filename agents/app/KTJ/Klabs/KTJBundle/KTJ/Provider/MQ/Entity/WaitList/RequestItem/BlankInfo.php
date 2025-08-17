<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class BlankInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class BlankInfo
{
    /**
     * @var null|PassengerInfo $PassengerInfo
     */
    protected $PassengerInfo;
    /**
     * @var null|PassengerDiscountCardInfo $PassengerDiscountCardInfo
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
     * @return BlankInfo
     */
    public function setPassengerInfo(?PassengerInfo $PassengerInfo): BlankInfo
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
     */
    public function setPassengerDiscountCardInfo(?PassengerDiscountCardInfo $PassengerDiscountCardInfo): void
    {
        $this->PassengerDiscountCardInfo = $PassengerDiscountCardInfo;
    }
}
