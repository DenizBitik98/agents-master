<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info;

use JMS\Serializer\Annotation as JMS;

class PassengersInfo
{
    /**
     * @JMS\SerializedName("PassengerDocument")
     * @JMS\Type("string")
     * @var null|string $PassengerDocument
     */
    protected $PassengerDocument;
    /**
     * @JMS\SerializedName("PassengerFullName")
     * @JMS\Type("string")
     * @var null|string $PassengerFullName
     */
    protected $PassengerFullName;

    /**
     * @return string|null
     */
    public function getPassengerDocument(): ?string
    {
        return $this->PassengerDocument;
    }

    /**
     * @param string|null $PassengerDocument
     */
    public function setPassengerDocument(?string $PassengerDocument): void
    {
        $this->PassengerDocument = $PassengerDocument;
    }

    /**
     * @return string|null
     */
    public function getPassengerFullName(): ?string
    {
        return $this->PassengerFullName;
    }

    /**
     * @param string|null $PassengerFullName
     */
    public function setPassengerFullName(?string $PassengerFullName): void
    {
        $this->PassengerFullName = $PassengerFullName;
    }
}
