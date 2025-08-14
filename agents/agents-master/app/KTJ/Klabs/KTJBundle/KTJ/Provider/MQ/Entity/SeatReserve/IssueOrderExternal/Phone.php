<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;
use JMS\Serializer\Annotation as JMS;


class Phone
{
    /**
     * @JMS\SerializedName("PhoneNumber")
     * @JMS\Type("string")
     * @var null|string $PhoneNumber
     */
    protected $PhoneNumber;

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    /**
     * @param string|null $PhoneNumber
     */
    public function setPhoneNumber(?string $PhoneNumber): void
    {
        $this->PhoneNumber = $PhoneNumber;
    }
}
