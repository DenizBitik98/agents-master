<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Ticket;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Ticket
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Ticket
 */
class Ticket
{
    /**
     * @JMS\SerializedName("ExpressIdOrBlankIdentity")
     * @JMS\Type("string")
     * @var null|string $ExpressIdOrBlankIdentity
     */
    protected $ExpressIdOrBlankIdentity;
    /**
     * @JMS\SerializedName("ReturnTariff")
     * @JMS\Type("float")
     * @var null|float $ReturnTariff
     */
    protected $ReturnTariff;
    /**
     * @JMS\SerializedName("KRS")
     * @JMS\Type("string")
     * @var null|string $KRS
     */
    protected $KRS;
    /**
     * @JMS\SerializedName("BiletReturnTariff")
     * @JMS\Type("float")
     * @var null|float $BiletReturnTariff
     */
    protected $BiletReturnTariff;
    /**
     * @JMS\SerializedName("PlackartaReturnTariff")
     * @JMS\Type("float")
     * @var null|float $PlackartaReturnTariff
     */
    protected $PlackartaReturnTariff;
    /**
     * @JMS\SerializedName("ServiceReturnTariff")
     * @JMS\Type("float")
     * @var null|float $ServiceReturnTariff
     */
    protected $ServiceReturnTariff;
    /**
     * @JMS\SerializedName("ReturnComissionTariff")
     * @JMS\Type("float")
     * @var null|float $ReturnComissionTariff
     */
    protected $ReturnComissionTariff;
    /**
     * @JMS\SerializedName("PassengersInfo")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Ticket\TicketInfo>")
     * @var null|Collection|TicketInfo[] $TicketInfo
     */
    protected $TicketInfo;
    /**
     * @JMS\SerializedName("PRZDN")
     * @JMS\Type("string")
     * @var null|string $PRZDN
     */
    protected $PRZDN;
    /**
     * @JMS\SerializedName("TransportDemandBookingReceiptCount")
     * @JMS\Type("int")
     * @var null|integer $TransportDemandBookingReceiptCount
     */
    protected $TransportDemandBookingReceiptCount;
    /**
     * @JMS\SerializedName("ReissueDetail")
     * @JMS\Type("string")
     * @var null|string $ReissueDetail
     */
    protected $ReissueDetail;
    /**
     * @JMS\SerializedName("RefiscaleRequested")
     * @JMS\Type("bool")
     * @var null|boolean $RefiscaleRequested
     */
    protected $RefiscaleRequested;

    /**
     * @return string|null
     */
    public function getExpressIdOrBlankIdentity(): ?string
    {
        return $this->ExpressIdOrBlankIdentity;
    }

    /**
     * @param string|null $ExpressIdOrBlankIdentity
     */
    public function setExpressIdOrBlankIdentity(?string $ExpressIdOrBlankIdentity): void
    {
        $this->ExpressIdOrBlankIdentity = $ExpressIdOrBlankIdentity;
    }

    /**
     * @return float|null
     */
    public function getReturnTariff(): ?float
    {
        return $this->ReturnTariff;
    }

    /**
     * @param float|null $ReturnTariff
     */
    public function setReturnTariff(?float $ReturnTariff): void
    {
        $this->ReturnTariff = $ReturnTariff;
    }

    /**
     * @return string|null
     */
    public function getKRS(): ?string
    {
        return $this->KRS;
    }

    /**
     * @param string|null $KRS
     */
    public function setKRS(?string $KRS): void
    {
        $this->KRS = $KRS;
    }

    /**
     * @return float|null
     */
    public function getBiletReturnTariff(): ?float
    {
        return $this->BiletReturnTariff;
    }

    /**
     * @param float|null $BiletReturnTariff
     */
    public function setBiletReturnTariff(?float $BiletReturnTariff): void
    {
        $this->BiletReturnTariff = $BiletReturnTariff;
    }

    /**
     * @return float|null
     */
    public function getPlackartaReturnTariff(): ?float
    {
        return $this->PlackartaReturnTariff;
    }

    /**
     * @param float|null $PlackartaReturnTariff
     */
    public function setPlackartaReturnTariff(?float $PlackartaReturnTariff): void
    {
        $this->PlackartaReturnTariff = $PlackartaReturnTariff;
    }

    /**
     * @return float|null
     */
    public function getServiceReturnTariff(): ?float
    {
        return $this->ServiceReturnTariff;
    }

    /**
     * @param float|null $ServiceReturnTariff
     */
    public function setServiceReturnTariff(?float $ServiceReturnTariff): void
    {
        $this->ServiceReturnTariff = $ServiceReturnTariff;
    }

    /**
     * @return float|null
     */
    public function getReturnComissionTariff(): ?float
    {
        return $this->ReturnComissionTariff;
    }

    /**
     * @param float|null $ReturnComissionTariff
     */
    public function setReturnComissionTariff(?float $ReturnComissionTariff): void
    {
        $this->ReturnComissionTariff = $ReturnComissionTariff;
    }

    /**
     * @return Collection|TicketInfo[]|null
     */
    public function getTicketInfo()
    {
        return $this->TicketInfo;
    }

    /**
     * @param Collection|TicketInfo[]|null $TicketInfo
     */
    public function setTicketInfo($TicketInfo): void
    {
        $this->TicketInfo = $TicketInfo;
    }

    /**
     * @return string|null
     */
    public function getPRZDN(): ?string
    {
        return $this->PRZDN;
    }

    /**
     * @param string|null $PRZDN
     */
    public function setPRZDN(?string $PRZDN): void
    {
        $this->PRZDN = $PRZDN;
    }

    /**
     * @return int|null
     */
    public function getTransportDemandBookingReceiptCount(): ?int
    {
        return $this->TransportDemandBookingReceiptCount;
    }

    /**
     * @param int|null $TransportDemandBookingReceiptCount
     */
    public function setTransportDemandBookingReceiptCount(?int $TransportDemandBookingReceiptCount): void
    {
        $this->TransportDemandBookingReceiptCount = $TransportDemandBookingReceiptCount;
    }

    /**
     * @return string|null
     */
    public function getReissueDetail(): ?string
    {
        return $this->ReissueDetail;
    }

    /**
     * @param string|null $ReissueDetail
     */
    public function setReissueDetail(?string $ReissueDetail): void
    {
        $this->ReissueDetail = $ReissueDetail;
    }

    /**
     * @return bool|null
     */
    public function getRefiscaleRequested(): ?bool
    {
        return $this->RefiscaleRequested;
    }

    /**
     * @param bool|null $RefiscaleRequested
     */
    public function setRefiscaleRequested(?bool $RefiscaleRequested): void
    {
        $this->RefiscaleRequested = $RefiscaleRequested;
    }
}
