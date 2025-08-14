<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;

use JMS\Serializer\Annotation as JMS;

class Blank
{
    /**
     * @JMS\SerializedName("Identifier")
     * @JMS\Type("string")
     * @var null|string $Identifier
     */
    protected $Identifier;
    /**
     * @JMS\SerializedName("ParentIdentifier")
     * @JMS\Type("string")
     * @var null|string $ParentIdentifier
     */
    protected $ParentIdentifier;
    /**
     * @JMS\SerializedName("SeatsPerBlankCount")
     * @JMS\Type("int")
     * @var null|int $SeatsPerBlankCount
     */
    protected $SeatsPerBlankCount;
    /**
     * @JMS\SerializedName("IsGroup")
     * @JMS\Type("bool")
     * @var null|bool $IsGroup
     */
    protected $IsGroup;
    /**
     * @JMS\SerializedName("TransportCard")
     * @JMS\Type("string")
     * @var null|string $TransportCard
     */
    protected $TransportCard;
    /**
     * @JMS\SerializedName("PassengerInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\PassengerInfo")
     * @var null|PassengerInfo $PassengerInfo
     */
    protected $PassengerInfo;
    /**
     * @JMS\SerializedName("PaymentType")
     * @JMS\Type("int")
     * @var null|int $PaymentType
     */
    protected $PaymentType;
    /**
     * @JMS\SerializedName("PaymentOrderPayerCode")
     * @JMS\Type("string")
     * @var null|string $PaymentOrderPayerCode
     */
    protected $PaymentOrderPayerCode;
    /**
     * @JMS\SerializedName("AdditionalServices")
     * @JMS\Type("string")
     * @var null|string $AdditionalServices
     */
    protected $AdditionalServices;

    /**
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->Identifier;
    }

    /**
     * @param string|null $Identifier
     */
    public function setIdentifier(?string $Identifier): void
    {
        $this->Identifier = $Identifier;
    }

    /**
     * @return string|null
     */
    public function getParentIdentifier(): ?string
    {
        return $this->ParentIdentifier;
    }

    /**
     * @param string|null $ParentIdentifier
     */
    public function setParentIdentifier(?string $ParentIdentifier): void
    {
        $this->ParentIdentifier = $ParentIdentifier;
    }

    /**
     * @return int|null
     */
    public function getSeatsPerBlankCount(): ?int
    {
        return $this->SeatsPerBlankCount;
    }

    /**
     * @param int|null $SeatsPerBlankCount
     */
    public function setSeatsPerBlankCount(?int $SeatsPerBlankCount): void
    {
        $this->SeatsPerBlankCount = $SeatsPerBlankCount;
    }

    /**
     * @return bool|null
     */
    public function getIsGroup(): ?bool
    {
        return $this->IsGroup;
    }

    /**
     * @param bool|null $IsGroup
     */
    public function setIsGroup(?bool $IsGroup): void
    {
        $this->IsGroup = $IsGroup;
    }

    /**
     * @return string|null
     */
    public function getTransportCard(): ?string
    {
        return $this->TransportCard;
    }

    /**
     * @param string|null $TransportCard
     */
    public function setTransportCard(?string $TransportCard): void
    {
        $this->TransportCard = $TransportCard;
    }

    /**
     * @return PassengerInfo|null
     */
    public function getPassengerInfo(): ?PassengerInfo
    {
        return $this->PassengerInfo;
    }

    /**
     * @param PassengerInfo|null $PassengerInfo
     */
    public function setPassengerInfo(?PassengerInfo $PassengerInfo): void
    {
        $this->PassengerInfo = $PassengerInfo;
    }

    /**
     * @return int|null
     */
    public function getPaymentType(): ?int
    {
        return $this->PaymentType;
    }

    /**
     * @param int|null $PaymentType
     */
    public function setPaymentType(?int $PaymentType): void
    {
        $this->PaymentType = $PaymentType;
    }

    /**
     * @return string|null
     */
    public function getPaymentOrderPayerCode(): ?string
    {
        return $this->PaymentOrderPayerCode;
    }

    /**
     * @param string|null $PaymentOrderPayerCode
     */
    public function setPaymentOrderPayerCode(?string $PaymentOrderPayerCode): void
    {
        $this->PaymentOrderPayerCode = $PaymentOrderPayerCode;
    }

    /**
     * @return string|null
     */
    public function getAdditionalServices(): ?string
    {
        return $this->AdditionalServices;
    }

    /**
     * @param string|null $AdditionalServices
     */
    public function setAdditionalServices(?string $AdditionalServices): void
    {
        $this->AdditionalServices = $AdditionalServices;
    }
}
