<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class PassengerPhone
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class PassengerPhone
{
    /**
     * @var null|string $PhoneNumber
     */
    protected $PhoneNumber;

    /**
     * PassengerPhone constructor.
     * @param string|null $PhoneNumber
     */
    public function __construct(?string $PhoneNumber)
    {
        $this->setPhoneNumber($PhoneNumber);
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    /**
     * @param string|null $PhoneNumber
     * @return PassengerPhone
     */
    public function setPhoneNumber(?string $PhoneNumber): PassengerPhone
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }
}
