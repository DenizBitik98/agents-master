<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class Phone
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Phone
{
    /**
     * @var null|string $PhoneNumber
     */
    protected $PhoneNumber;

    /**
     * Phone constructor.
     * @param string|null $PhoneNumber
     */
    public function __construct(?string $PhoneNumber = null)
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
     * @return Phone
     */
    public function setPhoneNumber(?string $PhoneNumber): Phone
    {
        $this->PhoneNumber = $PhoneNumber;
        return $this;
    }
}
