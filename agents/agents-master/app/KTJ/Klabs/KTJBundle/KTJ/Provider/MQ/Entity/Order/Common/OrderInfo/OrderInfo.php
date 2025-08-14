<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\OrderInfo;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\OrderInfo
 */
class OrderInfo
{
    /**
     * @JMS\SerializedName("DepartureTrainNumber")
     * @JMS\Type("string")
     * @var null|string $DepartureTrainNumber
     */
    protected $DepartureTrainNumber;
    /**
     * @JMS\SerializedName("DepartureStationCode")
     * @JMS\Type("string")
     * @var null|string $DepartureStationCode
     */
    protected $DepartureStationCode;
    /**
     * @JMS\SerializedName("DepartureStationName")
     * @JMS\Type("string")
     * @var null|string $DepartureStationName
     */
    protected $DepartureStationName;
    /**
     * @JMS\SerializedName("DepartureTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $DepartureTimeStamp
     */
    protected $DepartureTimeStamp;
    /**
     * @JMS\SerializedName("ArrivalTrainNumber")
     * @JMS\Type("string")
     * @var null|string $ArrivalTrainNumber
     */
    protected $ArrivalTrainNumber;
    /**
     * @JMS\SerializedName("ArrivalStationCode")
     * @JMS\Type("string")
     * @var null|string $ArrivalStationCode
     */
    protected $ArrivalStationCode;
    /**
     * @JMS\SerializedName("ArrivalStationName")
     * @JMS\Type("string")
     * @var null|string $ArrivalStationName
     */
    protected $ArrivalStationName;
    /**
     * @JMS\SerializedName("ArrivalTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $ArrivalTimeStamp
     */
    protected $ArrivalTimeStamp;
    /**
     * @JMS\SerializedName("CarType")
     * @JMS\Type("int")
     * @var null|integer $CarType
     */
    protected $CarType;
    /**
     * @JMS\SerializedName("CarNumber")
     * @JMS\Type("string")
     * @var null|string $CarNumber
     */
    protected $CarNumber;
    /**
     * @JMS\SerializedName("ServiceClass")
     * @JMS\Type("string")
     * @var null|string $ServiceClass
     */
    protected $ServiceClass;
    /**
     * @JMS\SerializedName("CarrierName")
     * @JMS\Type("string")
     * @var null|string $CarrierName
     */
    protected $CarrierName;
    /**
     * @JMS\SerializedName("CarrierINN")
     * @JMS\Type("string")
     * @var null|string $CarrierINN
     */
    protected $CarrierINN;
    /**
     * @JMS\SerializedName("IsInterstate")
     * @JMS\Type("bool")
     * @var null|boolean $IsInterstate
     */
    protected $IsInterstate;

    /**
     * @return string|null
     */
    public function getDepartureTrainNumber(): ?string
    {
        return $this->DepartureTrainNumber;
    }

    /**
     * @param string|null $DepartureTrainNumber
     */
    public function setDepartureTrainNumber(?string $DepartureTrainNumber): void
    {
        $this->DepartureTrainNumber = $DepartureTrainNumber;
    }

    /**
     * @return string|null
     */
    public function getDepartureStationCode(): ?string
    {
        return $this->DepartureStationCode;
    }

    /**
     * @param string|null $DepartureStationCode
     */
    public function setDepartureStationCode(?string $DepartureStationCode): void
    {
        $this->DepartureStationCode = $DepartureStationCode;
    }

    /**
     * @return string|null
     */
    public function getDepartureStationName(): ?string
    {
        return $this->DepartureStationName;
    }

    /**
     * @param string|null $DepartureStationName
     */
    public function setDepartureStationName(?string $DepartureStationName): void
    {
        $this->DepartureStationName = $DepartureStationName;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureTimeStamp(): ?DateTime
    {
        return $this->DepartureTimeStamp;
    }

    /**
     * @param DateTime|null $DepartureTimeStamp
     */
    public function setDepartureTimeStamp(?DateTime $DepartureTimeStamp): void
    {
        $this->DepartureTimeStamp = $DepartureTimeStamp;
    }

    /**
     * @return string|null
     */
    public function getArrivalTrainNumber(): ?string
    {
        return $this->ArrivalTrainNumber;
    }

    /**
     * @param string|null $ArrivalTrainNumber
     */
    public function setArrivalTrainNumber(?string $ArrivalTrainNumber): void
    {
        $this->ArrivalTrainNumber = $ArrivalTrainNumber;
    }

    /**
     * @return string|null
     */
    public function getArrivalStationCode(): ?string
    {
        return $this->ArrivalStationCode;
    }

    /**
     * @param string|null $ArrivalStationCode
     */
    public function setArrivalStationCode(?string $ArrivalStationCode): void
    {
        $this->ArrivalStationCode = $ArrivalStationCode;
    }

    /**
     * @return string|null
     */
    public function getArrivalStationName(): ?string
    {
        return $this->ArrivalStationName;
    }

    /**
     * @param string|null $ArrivalStationName
     */
    public function setArrivalStationName(?string $ArrivalStationName): void
    {
        $this->ArrivalStationName = $ArrivalStationName;
    }

    /**
     * @return DateTime|null
     */
    public function getArrivalTimeStamp(): ?DateTime
    {
        return $this->ArrivalTimeStamp;
    }

    /**
     * @param DateTime|null $ArrivalTimeStamp
     */
    public function setArrivalTimeStamp(?DateTime $ArrivalTimeStamp): void
    {
        $this->ArrivalTimeStamp = $ArrivalTimeStamp;
    }

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
    public function getCarrierName(): ?string
    {
        return $this->CarrierName;
    }

    /**
     * @param string|null $CarrierName
     */
    public function setCarrierName(?string $CarrierName): void
    {
        $this->CarrierName = $CarrierName;
    }

    /**
     * @return string|null
     */
    public function getCarrierINN(): ?string
    {
        return $this->CarrierINN;
    }

    /**
     * @param string|null $CarrierINN
     */
    public function setCarrierINN(?string $CarrierINN): void
    {
        $this->CarrierINN = $CarrierINN;
    }

    /**
     * @return bool|null
     */
    public function getIsInterstate(): ?bool
    {
        return $this->IsInterstate;
    }

    /**
     * @param bool|null $IsInterstate
     */
    public function setIsInterstate(?bool $IsInterstate): void
    {
        $this->IsInterstate = $IsInterstate;
    }
}
