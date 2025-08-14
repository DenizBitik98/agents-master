<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class PassengerEmail
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class PassengerEmail
{
    /**
     * @var null|string $EmailAddress
     */
    protected $EmailAddress;

    /**
     * PassengerEmail constructor.
     * @param string|null $EmailAddress
     */
    public function __construct(?string $EmailAddress)
    {
        $this->setEmailAddress($EmailAddress);
    }

    /**
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->EmailAddress;
    }

    /**
     * @param string|null $EmailAddress
     * @return PassengerEmail
     */
    public function setEmailAddress(?string $EmailAddress): PassengerEmail
    {
        $this->EmailAddress = $EmailAddress;

        return $this;
    }
}
