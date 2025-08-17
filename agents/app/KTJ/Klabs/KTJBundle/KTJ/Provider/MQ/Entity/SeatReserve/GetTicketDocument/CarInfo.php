<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument;
use JMS\Serializer\Annotation as JMS;

/**
 * Class CarInfo
 * @package Passenger\SeatReserveBundle\Model\Response
 */
class CarInfo
{
    /**
     * @JMS\SerializedName("CarType")
     * @JMS\Type("int")
     * @var null|int $CarType
     */
    protected $CarType;
    /**
     * @JMS\SerializedName("ServiceClass")
     * @JMS\Type("string")
     * @var null|string $ServiceClass
     */
    protected $ServiceClass;
    /**
     * @JMS\SerializedName("CarNumber")
     * @JMS\Type("string")
     * @var null|string $CarNumber
     */
    protected $CarNumber;
    /**
     * @JMS\SerializedName("Road")
     * @JMS\Type("string")
     * @var null|string $Road
     */
    protected $Road;
    /**
     * @JMS\SerializedName("CarrierMnemocode")
     * @JMS\Type("string")
     * @var null|string $CarrierMnemocode
     */
    protected $CarrierMnemocode;

    /**
     * @return int|null
     */
    public function getCarType(): ?int
    {
        return $this->CarType;
    }

    /**
     * @param int|null $CarType
     */
    public function setCarType(?int $CarType): void
    {
        $this->CarType = $CarType;
    }

    /**
     * @return string|null
     */
    public function getServiceClass(): ?string
    {
        return $this->ServiceClass;
    }

    /**
     * @param string|null $ServiceClass
     */
    public function setServiceClass(?string $ServiceClass): void
    {
        $this->ServiceClass = $ServiceClass;
    }

    /**
     * @return string|null
     */
    public function getCarNumber(): ?string
    {
        return $this->CarNumber;
    }

    /**
     * @param string|null $CarNumber
     */
    public function setCarNumber(?string $CarNumber): void
    {
        $this->CarNumber = $CarNumber;
    }

    /**
     * @return string|null
     */
    public function getRoad(): ?string
    {
        return $this->Road;
    }

    /**
     * @param string|null $Road
     */
    public function setRoad(?string $Road): void
    {
        $this->Road = $Road;
    }

    /**
     * @return string|null
     */
    public function getCarrierMnemocode(): ?string
    {
        return $this->CarrierMnemocode;
    }

    /**
     * @param string|null $CarrierMnemocode
     */
    public function setCarrierMnemocode(?string $CarrierMnemocode): void
    {
        $this->CarrierMnemocode = $CarrierMnemocode;
    }
}
