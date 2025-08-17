<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument;

use \DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TicketDocumentTripInfo
 * @package Passenger\SeatReserveBundle\Model\Response
 */
class TicketDocumentTripInfo
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
     * @JMS\SerializedName("ArrivalTimeStamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $ArrivalTimeStamp
     */
    protected $ArrivalTimeStamp;
    /**
     * @JMS\SerializedName("CarInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument\CarInfo")
     * @var null|CarInfo $CarInfo
     */
    protected $CarInfo;

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
}
