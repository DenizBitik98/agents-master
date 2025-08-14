<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 20:24
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use App\KTJ\Klabs\KTJBundle\KTJ\Utils\TimeSpan;
use DateInterval;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Exception;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Train
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Train
{
    /**
     * @JMS\SerializedName("Number")
     * @JMS\Type("string")
     * @var null|string $Number
     */
    protected $Number;
    /**
     * @JMS\SerializedName("Number2")
     * @JMS\Type("string")
     * @var null|string $Number2
     */
    protected $Number2;
    /**
     * @JMS\SerializedName("Type")
     * @JMS\Type("string")
     * @var null|string $Type
     */
    protected $Type;
    /**
     * @JMS\SerializedName("Route")
     * @JMS\Type("ArrayCollection<string>")
     * @var null|Collection $Route
     */
    protected $Route;
    /**
     * @JMS\SerializedName("DepartureDateTime")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $DepartureDateTime
     */
    protected $DepartureDateTime;
    /**
     * @JMS\SerializedName("DepartureStop")
     * @JMS\Type("string")
     * @var null|string $DepartureStop
     */
    protected $DepartureStop;
    /**
     * @JMS\SerializedName("ArrivalDateTime")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $ArrivalDateTime
     */
    protected $ArrivalDateTime;
    /**
     * @JMS\SerializedName("ArrivalStop")
     * @JMS\Type("string")
     * @var null|string $ArrivalStop
     */
    protected $ArrivalStop;
    /**
     * @JMS\SerializedName("TimeInWay")
     * @JMS\Type("string")
     * @var null|string $TimeInWay
     */
    protected $TimeInWay;

    /**
     * @JMS\SerializedName("ElRegPossible")
     * @JMS\Type("boolean")
     * @var null|bool $ElRegPossible
     */
    protected $ElRegPossible;
    /**
     * @JMS\SerializedName("Brand")
     * @JMS\Type("string")
     * @var null|string $Brand
     */
    protected $Brand;
    /**
     * @JMS\SerializedName("FirmName")
     * @JMS\Type("string")
     * @var null|string $FirmName
     */
    protected $FirmName;
    /**
     * @JMS\SerializedName("IsWithoutPassengerInfo")
     * @JMS\Type("boolean")
     * @var null|bool $IsWithoutPassengerInfo
     */
    protected $IsWithoutPassengerInfo;
    /**
     * @JMS\SerializedName("TrainDetail")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\TrainDetail")
     * @var null|TrainDetail $TrainDetail
     */
    protected $TrainDetail;
    /**
     * @JMS\SerializedName("Comments")
     * @JMS\Type("ArrayCollection<string>")
     * @var null|Collection $Comments
     */
    protected $Comments;

    /**
     * Train constructor.
     *
     * @param null|string $Number
     */
    public function __construct(?string $Number = null)
    {
        $this->setNumber($Number);
    }

    /**
     * @return null|string
     */
    public function getNumber(): ?string
    {
        return $this->Number;
    }

    /**
     * @param null|string $Number
     *
     * @return Train
     */
    public function setNumber(?string $Number): Train
    {
        $this->Number = $Number;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNumber2(): ?string
    {
        return $this->Number2;
    }

    /**
     * @param null|string $Number2
     *
     * @return Train
     */
    public function setNumber2(?string $Number2): Train
    {
        $this->Number2 = $Number2;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->Type;
    }

    /**
     * @param null|string $Type
     *
     * @return Train
     */
    public function setType(?string $Type): Train
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getRoute(): ?Collection
    {
        return $this->Route;
    }

    /**
     * @param Collection|null $Route
     *
     * @return Train
     */
    public function setRoute(?Collection $Route): Train
    {
        $this->Route = $Route;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureDateTime(): ?DateTime
    {
        return $this->DepartureDateTime;
    }

    /**
     * @param DateTime|null $DepartureDateTime
     *
     * @return Train
     */
    public function setDepartureDateTime(?DateTime $DepartureDateTime): Train
    {
        $this->DepartureDateTime = $DepartureDateTime;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDepartureStop(): ?string
    {
        return $this->DepartureStop;
    }

    /**
     * @param null|string $DepartureStop
     *
     * @return Train
     */
    public function setDepartureStop(?string $DepartureStop): Train
    {
        $this->DepartureStop = $DepartureStop;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getArrivalDateTime(): ?DateTime
    {
        return $this->ArrivalDateTime;
    }

    /**
     * @param DateTime|null $ArrivalDateTime
     *
     * @return Train
     */
    public function setArrivalDateTime(?DateTime $ArrivalDateTime): Train
    {
        $this->ArrivalDateTime = $ArrivalDateTime;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getArrivalStop(): ?string
    {
        return $this->ArrivalStop;
    }

    /**
     * @param null|string $ArrivalStop
     *
     * @return Train
     */
    public function setArrivalStop(?string $ArrivalStop): Train
    {
        $this->ArrivalStop = $ArrivalStop;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTimeInWay(): ?string
    {
        return $this->TimeInWay;
    }

    /**
     * Get time in way as date interval
     * @return DateInterval|null
     * @throws Exception
     */
    public function getTimeInWayAsDateInterval(): ?DateInterval
    {
        $timeInWay = TimeSpan::fromTimeSpan($this->getTimeInWay())->getInterval();
        $timeInWay->invert = true;

        return $timeInWay;
    }

    /**
     * @param null|string $TimeInWay
     *
     * @return Train
     */
    public function setTimeInWay(?string $TimeInWay): Train
    {
        $this->TimeInWay = $TimeInWay;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getElRegPossible(): ?bool
    {
        return $this->ElRegPossible;
    }

    /**
     * @param bool|null $ElRegPossible
     *
     * @return Train
     */
    public function setElRegPossible(?bool $ElRegPossible): Train
    {
        $this->ElRegPossible = $ElRegPossible;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    /**
     * @param null|string $Brand
     *
     * @return Train
     */
    public function setBrand(?string $Brand): Train
    {
        $this->Brand = $Brand;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getFirmName(): ?string
    {
        return $this->FirmName;
    }

    /**
     * @param null|string $FirmName
     *
     * @return Train
     */
    public function setFirmName(?string $FirmName): Train
    {
        $this->FirmName = $FirmName;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getisWithoutPassengerInfo(): ?bool
    {
        return $this->IsWithoutPassengerInfo;
    }

    /**
     * @param bool|null $IsWithoutPassengerInfo
     *
     * @return Train
     */
    public function setIsWithoutPassengerInfo(?bool $IsWithoutPassengerInfo): Train
    {
        $this->IsWithoutPassengerInfo = $IsWithoutPassengerInfo;

        return $this;
    }

    /**
     * @return TrainDetail|null
     */
    public function getTrainDetail(): ?TrainDetail
    {
        return $this->TrainDetail;
    }

    /**
     * @param TrainDetail|null $TrainDetail
     *
     * @return Train
     */
    public function setTrainDetail(?TrainDetail $TrainDetail): Train
    {
        $this->TrainDetail = $TrainDetail;

        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getComments(): ?Collection
    {
        return $this->Comments;
    }

    /**
     * @param Collection|null $Comments
     *
     * @return Train
     */
    public function setComments(?Collection $Comments): Train
    {
        $this->Comments = $Comments;

        return $this;
    }
}
