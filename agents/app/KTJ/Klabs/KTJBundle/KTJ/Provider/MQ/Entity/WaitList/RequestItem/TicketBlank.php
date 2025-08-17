<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class TicketBlank
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class TicketBlank
{
    /**
     * @var null|int $PassengerNumber
     */
    protected $PassengerNumber;
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
     * @return int|null
     */
    public function getPassengerNumber(): ?int
    {
        return $this->PassengerNumber;
    }

    /**
     * @param int|null $PassengerNumber
     * @return TicketBlank
     */
    public function setPassengerNumber(?int $PassengerNumber): TicketBlank
    {
        $this->PassengerNumber = $PassengerNumber;

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
     * @return TicketBlank
     */
    public function setSeatsPerBlankCount(?int $SeatsPerBlankCount): TicketBlank
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
     * @return TicketBlank
     */
    public function setIsGroup(?bool $IsGroup): TicketBlank
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
     * @return TicketBlank
     */
    public function setTransportCard(?string $TransportCard): TicketBlank
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
     * @return TicketBlank
     */
    public function setPassengerInfo(?PassengerInfo $PassengerInfo): TicketBlank
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
     * @return TicketBlank
     */
    public function setPaymentType(?int $PaymentType): TicketBlank
    {
        $this->PaymentType = $PaymentType;

        return $this;
    }
}
