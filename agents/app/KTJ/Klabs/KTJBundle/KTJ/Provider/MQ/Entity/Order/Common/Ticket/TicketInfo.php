<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Ticket;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Passenger\PassengersInfo;

/**
 * Class TicketInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Ticket
 */
class TicketInfo
{
    /**
     * @JMS\SerializedName("SeatNumbers")
     * @JMS\Type("string")
     * @var null|string $SeatNumbers
     */
    protected $SeatNumbers;
    /**
     * @JMS\SerializedName("BlankId")
     * @JMS\Type("string")
     * @var null|string $BlankId
     */
    protected $BlankId;
    /**
     * @JMS\SerializedName("TariffType")
     * @JMS\Type("string")
     * @var null|string $TariffType
     */
    protected $TariffType;
    /**
     * @JMS\SerializedName("PreferenceTariffInfo")
     * @JMS\Type("string")
     * @var null|string $PreferenceTariffInfo
     */
    protected $PreferenceTariffInfo;
    /**
     * @JMS\SerializedName("PassengersInfo")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Passenger\PassengersInfo\PassengersInfo>")
     * @var null|Collection|PassengersInfo[] $PassengersInfo
     */
    protected $PassengersInfo;


    /**
     * @return string|null
     */
    public function getSeatNumbers(): ?string
    {
        return $this->SeatNumbers;
    }

    /**
     * @param string|null $SeatNumbers
     */
    public function setSeatNumbers(?string $SeatNumbers): void
    {
        $this->SeatNumbers = $SeatNumbers;
    }

    /**
     * @return string|null
     */
    public function getBlankId(): ?string
    {
        return $this->BlankId;
    }

    /**
     * @param string|null $BlankId
     */
    public function setBlankId(?string $BlankId): void
    {
        $this->BlankId = $BlankId;
    }

    /**
     * @return string|null
     */
    public function getTariffType(): ?string
    {
        return $this->TariffType;
    }

    /**
     * @param string|null $TariffType
     */
    public function setTariffType(?string $TariffType): void
    {
        $this->TariffType = $TariffType;
    }

    /**
     * @return string|null
     */
    public function getPreferenceTariffInfo(): ?string
    {
        return $this->PreferenceTariffInfo;
    }

    /**
     * @param string|null $PreferenceTariffInfo
     */
    public function setPreferenceTariffInfo(?string $PreferenceTariffInfo): void
    {
        $this->PreferenceTariffInfo = $PreferenceTariffInfo;
    }

    /**
     * @return Collection|PassengersInfo[]|null
     */
    public function getPassengersInfo()
    {
        return $this->PassengersInfo;
    }

    /**
     * @param Collection|PassengersInfo[]|null $PassengersInfo
     */
    public function setPassengersInfo($PassengersInfo): void
    {
        $this->PassengersInfo = $PassengersInfo;
    }
}
