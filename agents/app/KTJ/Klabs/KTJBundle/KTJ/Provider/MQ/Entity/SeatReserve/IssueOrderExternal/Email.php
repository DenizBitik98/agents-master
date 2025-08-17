<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;
use JMS\Serializer\Annotation as JMS;


class Email
{
    /**
     * @JMS\SerializedName("EmailAddress")
     * @JMS\Type("string")
     * @var null|string $EmailAddress
     */
    protected $EmailAddress;

    /**
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->EmailAddress;
    }

    /**
     * @param string|null $EmailAddress
     */
    public function setEmailAddress(?string $EmailAddress): void
    {
        $this->EmailAddress = $EmailAddress;
    }
}
