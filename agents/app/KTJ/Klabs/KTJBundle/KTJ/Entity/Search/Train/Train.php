<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:54
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Train as BaseClass;

/**
 * Class Train
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Train
 */
class Train extends BaseClass
{
    /**
     * @JMS\SerializedName("Cars")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\Car>")
     * @var null|Collection|Car[] $Cars
     */
    protected $Cars;
    /**
     * @JMS\SerializedName("ArrivalDiffTime")
     * @JMS\Type("int")
     * @var null|int $ArrivalDiffTime
     */
    protected $ArrivalDiffTime;
    /**
     * @JMS\SerializedName("DepartureDiffTime")
     * @JMS\Type("int")
     * @var null|int $DepartureDiffTime
     */
    protected $DepartureDiffTime;
    /**
     * @JMS\SerializedName("DepartureLocalDateTime")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $DepartureLocalDateTime
     */
    protected $DepartureLocalDateTime;
    /**
     * @JMS\SerializedName("ArrivalLocalDateTime")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $ArrivalLocalDateTime
     */
    protected $ArrivalLocalDateTime;
    /**
     * @JMS\SerializedName("ShowLocalDepartureTime")
     * @JMS\Type("bool")
     * @var null|bool $ShowLocalDepartureTime
     */
    protected $ShowLocalDepartureTime;
    /**
     * @JMS\SerializedName("ShowLocalArrivalTime")
     * @JMS\Type("bool")
     * @var null|bool $ShowLocalArrivalTime
     */
    protected $ShowLocalArrivalTime;

    /**
     * @return Collection|Car[]|null
     */
    public function getCars()
    {
        return $this->Cars;
    }

    /**
     * Search car by the type
     *
     * @param int $type Car type
     * @param mixed $onEmpty Whether should be returned on missing car
     *
     * @return mixed|Car
     */
    function getCarByType($type, $onEmpty = false)
    {
        foreach ($this->getCars() as $car) {
            if ($car->getType() == $type) {
                return $car;
            }
        }

        return $onEmpty;
    }

    /**
     * @param Collection|null $Cars
     *
     * @return Train
     */
    public function setCars(?Collection $Cars): Train
    {
        $this->Cars = $Cars;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getArrivalDiffTime(): ?int
    {
        return $this->ArrivalDiffTime;
    }

    /**
     * @param int|null $ArrivalDiffTime
     * @return Train
     */
    public function setArrivalDiffTime(?int $ArrivalDiffTime): Train
    {
        $this->ArrivalDiffTime = $ArrivalDiffTime;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getArrivalLocalDateTime(): ?DateTime
    {
        return $this->ArrivalLocalDateTime;
    }

    /**
     * @param DateTime|null $ArrivalLocalDateTime
     * @return Train
     */
    public function setArrivalLocalDateTime(?DateTime $ArrivalLocalDateTime): Train
    {
        $this->ArrivalLocalDateTime = $ArrivalLocalDateTime;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDepartureDiffTime(): ?int
    {
        return $this->DepartureDiffTime;
    }

    /**
     * @param int|null $DepartureDiffTime
     * @return Train
     */
    public function setDepartureDiffTime(?int $DepartureDiffTime): Train
    {
        $this->DepartureDiffTime = $DepartureDiffTime;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDepartureLocalDateTime(): ?DateTime
    {
        return $this->DepartureLocalDateTime;
    }

    /**
     * @param DateTime|null $DepartureLocalDateTime
     * @return Train
     */
    public function setDepartureLocalDateTime(?DateTime $DepartureLocalDateTime): Train
    {
        $this->DepartureLocalDateTime = $DepartureLocalDateTime;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowLocalDepartureTime(): ?bool
    {
        return $this->ShowLocalDepartureTime;
    }

    /**
     * @param bool|null $ShowLocalDepartureTime
     * @return Train
     */
    public function setShowLocalDepartureTime(?bool $ShowLocalDepartureTime): Train
    {
        $this->ShowLocalDepartureTime = $ShowLocalDepartureTime;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowLocalArrivalTime(): ?bool
    {
        return $this->ShowLocalArrivalTime;
    }

    /**
     * @param bool|null $ShowLocalArrivalTime
     * @return Train
     */
    public function setShowLocalArrivalTime(?bool $ShowLocalArrivalTime): Train
    {
        $this->ShowLocalArrivalTime = $ShowLocalArrivalTime;
        return $this;
    }
}
