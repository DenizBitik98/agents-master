<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Ticket
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info
 */
class Ticket
{
    /**
     * @JMS\SerializedName("ExpressId")
     * @JMS\Type("string")
     * @var null|string $ExpressId
     */
    protected $ExpressId;
    /**
     * @JMS\SerializedName("TicketStatus")
     * @JMS\Type("int")
     * @var null|integer $TicketStatus
     */
    protected $TicketStatus;
    /**
     * @JMS\SerializedName("AllOrderTicketsLink")
     * @JMS\Type("bool")
     * @var null|boolean $AllOrderTicketsLink
     */
    protected $AllOrderTicketsLink;
    /**
     * @JMS\SerializedName("IIR")
     * @JMS\Type("string")
     * @var null|string $IIR
     */
    protected $IIR;
    /**
     * @JMS\SerializedName("Seats")
     * @JMS\Type("string")
     * @var null|string $Seats
     */
    protected $Seats;
    /**
     * @JMS\SerializedName("Tariff")
     * @JMS\Type("float")
     * @var null|float $Tariff
     */
    protected $Tariff;
    /**
     * @JMS\SerializedName("TariffService")
     * @JMS\Type("float")
     * @var null|float $TariffService
     */
    protected $TariffService;
    /**
     * @JMS\SerializedName("TicketTariffType")
     * @JMS\Type("string")
     * @var null|string $TicketTariffType
     */
    protected $TicketTariffType;
    /**
     * @JMS\SerializedName("PassengersInfo")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info\PassengersInfo>")
     * @var null|Collection|PassengersInfo[] $PassengersInfo
     */
    protected $PassengersInfo;
    /**
     * @JMS\SerializedName("BoardingForm")
     * @JMS\Type("int")
     * @var null|integer $BoardingForm
     */
    protected $BoardingForm;
    /**
     * @JMS\SerializedName("FiscalizationInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info\FiscalizationInfo")
     * @var null|FiscalizationInfo $FiscalizationInfo
     */
    protected $FiscalizationInfo;

    /**
     * @return string|null
     */
    public function getExpressId(): ?string
    {
        return $this->ExpressId;
    }

    /**
     * @param string|null $ExpressId
     */
    public function setExpressId(?string $ExpressId): void
    {
        $this->ExpressId = $ExpressId;
    }

    /**
     * @return int|null
     */
    public function getTicketStatus(): ?int
    {
        return $this->TicketStatus;
    }

    /**
     * @param int|null $TicketStatus
     */
    public function setTicketStatus(?int $TicketStatus): void
    {
        $this->TicketStatus = $TicketStatus;
    }

    /**
     * @return bool|null
     */
    public function getAllOrderTicketsLink(): ?bool
    {
        return $this->AllOrderTicketsLink;
    }

    /**
     * @param bool|null $AllOrderTicketsLink
     */
    public function setAllOrderTicketsLink(?bool $AllOrderTicketsLink): void
    {
        $this->AllOrderTicketsLink = $AllOrderTicketsLink;
    }

    /**
     * @return string|null
     */
    public function getIIR(): ?string
    {
        return $this->IIR;
    }

    /**
     * @param string|null $IIR
     */
    public function setIIR(?string $IIR): void
    {
        $this->IIR = $IIR;
    }

    /**
     * @return string|null
     */
    public function getSeats(): ?string
    {
        return $this->Seats;
    }

    /**
     * @param string|null $Seats
     */
    public function setSeats(?string $Seats): void
    {
        $this->Seats = $Seats;
    }

    /**
     * @return float|null
     */
    public function getTariff(): ?float
    {
        return $this->Tariff;
    }

    /**
     * @param float|null $Tariff
     */
    public function setTariff(?float $Tariff): void
    {
        $this->Tariff = $Tariff;
    }

    /**
     * @return float|null
     */
    public function getTariffService(): ?float
    {
        return $this->TariffService;
    }

    /**
     * @param float|null $TariffService
     */
    public function setTariffService(?float $TariffService): void
    {
        $this->TariffService = $TariffService;
    }

    /**
     * @return string|null
     */
    public function getTicketTariffType(): ?string
    {
        return $this->TicketTariffType;
    }

    /**
     * @param string|null $TicketTariffType
     */
    public function setTicketTariffType(?string $TicketTariffType): void
    {
        $this->TicketTariffType = $TicketTariffType;
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

    /**
     * @return int|null
     */
    public function getBoardingForm(): ?int
    {
        return $this->BoardingForm;
    }

    /**
     * @param int|null $BoardingForm
     */
    public function setBoardingForm(?int $BoardingForm): void
    {
        $this->BoardingForm = $BoardingForm;
    }

    /**
     * @return FiscalizationInfo|null
     */
    public function getFiscalizationInfo(): ?FiscalizationInfo
    {
        return $this->FiscalizationInfo;
    }

    /**
     * @param FiscalizationInfo|null $FiscalizationInfo
     */
    public function setFiscalizationInfo(?FiscalizationInfo $FiscalizationInfo): void
    {
        $this->FiscalizationInfo = $FiscalizationInfo;
    }
}
