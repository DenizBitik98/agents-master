<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;

use Application\Sonata\ClassificationBundle\Entity\Collection;
use \DateTime;
use JMS\Serializer\Annotation as JMS;


class IssuanceRequest
{
    /**
     * @JMS\SerializedName("TrainNumber")
     * @JMS\Type("string")
     * @var null|string $TrainNumber
     */
    protected $TrainNumber;
    /**
     * @JMS\SerializedName("DepartureTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $DepartureTimeStamp
     */
    protected $DepartureTimeStamp;
    /**
     * @JMS\SerializedName("DelayTime")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $DelayTime
     */
    protected $DelayTime;
    /**
     * @JMS\SerializedName("DepartureStation")
     * @JMS\Type("string")
     * @var null|string $DepartureStation
     */
    protected $DepartureStation;
    /**
     * @JMS\SerializedName("ArrivalStation")
     * @JMS\Type("string")
     * @var null|string $ArrivalStation
     */
    protected $ArrivalStation;
    /**
     * @JMS\SerializedName("CarInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\CarInfo")
     * @var null|CarInfo $CarInfo
     */
    protected $CarInfo;
    /**
     * @JMS\SerializedName("SeatsRange")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\SeatsRange")
     * @var null|SeatsRange $SeatsRange
     */
    protected $SeatsRange;
    /**
     * @JMS\SerializedName("ReservationsList")
     * @JMS\Type("ArrayCollection<string>")
     * @var null|Collection $ReservationsList
     */
    protected $ReservationsList;

    /**
     * @return string|null
     */
    public function getTrainNumber(): ?string
    {
        return $this->TrainNumber;
    }

    /**
     * @param string|null $TrainNumber
     */
    public function setTrainNumber(?string $TrainNumber): void
    {
        $this->TrainNumber = $TrainNumber;
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
     * @return DateTime|null
     */
    public function getDelayTime(): ?DateTime
    {
        return $this->DelayTime;
    }

    /**
     * @param DateTime|null $DelayTime
     */
    public function setDelayTime(?DateTime $DelayTime): void
    {
        $this->DelayTime = $DelayTime;
    }

    /**
     * @return string|null
     */
    public function getDepartureStation(): ?string
    {
        return $this->DepartureStation;
    }

    /**
     * @param string|null $DepartureStation
     */
    public function setDepartureStation(?string $DepartureStation): void
    {
        $this->DepartureStation = $DepartureStation;
    }

    /**
     * @return string|null
     */
    public function getArrivalStation(): ?string
    {
        return $this->ArrivalStation;
    }

    /**
     * @param string|null $ArrivalStation
     */
    public function setArrivalStation(?string $ArrivalStation): void
    {
        $this->ArrivalStation = $ArrivalStation;
    }

    /**
     * @return CarInfo|null
     */
    public function getCarInfo(): ?CarInfo
    {
        return $this->CarInfo;
    }

    /**
     * @param CarInfo|null $CarInfo
     */
    public function setCarInfo(?CarInfo $CarInfo): void
    {
        $this->CarInfo = $CarInfo;
    }

    /**
     * @return SeatsRange|null
     */
    public function getSeatsRange(): ?SeatsRange
    {
        return $this->SeatsRange;
    }

    /**
     * @param SeatsRange|null $SeatsRange
     */
    public function setSeatsRange(?SeatsRange $SeatsRange): void
    {
        $this->SeatsRange = $SeatsRange;
    }

    /**
     * @return Collection|null
     */
    public function getReservationsList()
    {
        return $this->ReservationsList;
    }

    /**
     * @param Collection|null $ReservationsList
     */
    public function setReservationsList( $ReservationsList): void
    {
        $this->ReservationsList = $ReservationsList;
    }
}
