<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class Email
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Email
{
    /**
     * @var null|string $EmailAddress
     */
    protected $EmailAddress;

    /**
     * Email constructor.
     * @param string|null $EmailAddress
     */
    public function __construct(?string $EmailAddress = null)
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
     * @return Email
     */
    public function setEmailAddress(?string $EmailAddress): Email
    {
        $this->EmailAddress = $EmailAddress;
        return $this;
    }
}
