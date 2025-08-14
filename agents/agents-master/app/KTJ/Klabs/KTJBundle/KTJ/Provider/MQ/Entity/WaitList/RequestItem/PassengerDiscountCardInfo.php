<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

use \DateTime;

/**
 * Class PassengerDiscountCardInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve
 */
class PassengerDiscountCardInfo
{
    /**
     * @var null|string $TransportCard
     */
    protected $TransportCard;
    /**
     * @var null|int $TariffType
     */
    protected $TariffType;
    /**
     * @var null|DateTime $BirthDate
     */
    protected $BirthDate;

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
     * @return int|null
     */
    public function getTariffType(): ?int
    {
        return $this->TariffType;
    }

    /**
     * @param int|null $TariffType
     */
    public function setTariffType(?int $TariffType): void
    {
        $this->TariffType = $TariffType;
    }

    /**
     * @return DateTime|null
     */
    public function getBirthDate(): ?DateTime
    {
        return $this->BirthDate;
    }

    /**
     * @param DateTime|null $BirthDate
     */
    public function setBirthDate(?DateTime $BirthDate): void
    {
        $this->BirthDate = $BirthDate;
    }
}
