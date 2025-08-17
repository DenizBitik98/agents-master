<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve;

/**
 * Class Blank
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve
 */
class Blank
{
    /**
     * @var null|string $Identifier
     */
    protected $Identifier;
    /**
     * @var null|string $ParentIdentifier
     */
    protected $ParentIdentifier;
    /**
     * @var null|int $SeatsPerBlankCount
     */
    protected $SeatsPerBlankCount;
    /**
     * @var null|bool $IsGroup
     */
    protected $IsGroup;
    /**
     * @var null|string $TransportCard
     */
    protected $TransportCard;
    /**
     * @var null|PassengerInfo $PassengerInfo
     */
    protected $PassengerInfo;
    /**
     * @var null|int $PaymentType
     */
    protected $PaymentType;
    /**
     * @var null|string $PaymentOrderPayerCode
     */
    protected $PaymentOrderPayerCode;
    /**
     * @var null|array $AdditionalServices
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
     * @return Blank
     */
    public function setIdentifier(?string $Identifier): Blank
    {
        $this->Identifier = $Identifier;

        return $this;
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
     * @return Blank
     */
    public function setParentIdentifier(?string $ParentIdentifier): Blank
    {
        $this->ParentIdentifier = $ParentIdentifier;

        return $this;
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
     * @return Blank
     */
    public function setSeatsPerBlankCount(?int $SeatsPerBlankCount): Blank
    {
        $this->SeatsPerBlankCount = $SeatsPerBlankCount;

        return $this;
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
     * @return Blank
     */
    public function setIsGroup(?bool $IsGroup): Blank
    {
        $this->IsGroup = $IsGroup;

        return $this;
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
     * @return Blank
     */
    public function setTransportCard(?string $TransportCard): Blank
    {
        $this->TransportCard = $TransportCard;

        return $this;
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
     * @return Blank
     */
    public function setPassengerInfo(?PassengerInfo $PassengerInfo): Blank
    {
        $this->PassengerInfo = $PassengerInfo;

        return $this;
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
     * @return Blank
     */
    public function setPaymentType(?int $PaymentType): Blank
    {
        $this->PaymentType = $PaymentType;

        return $this;
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
     * @return Blank
     */
    public function setPaymentOrderPayerCode(?string $PaymentOrderPayerCode): Blank
    {
        $this->PaymentOrderPayerCode = $PaymentOrderPayerCode;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getAdditionalServices(): ?array
    {
        return $this->AdditionalServices;
    }

    /**
     * @param array|null $AdditionalServices
     * @return Blank
     */
    public function setAdditionalServices(?array $AdditionalServices): Blank
    {
        $this->AdditionalServices = $AdditionalServices;

        return $this;
    }
}
