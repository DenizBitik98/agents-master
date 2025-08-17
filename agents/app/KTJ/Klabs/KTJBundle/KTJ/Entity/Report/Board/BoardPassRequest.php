<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 27.02.19
 * Time: 13:20
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Board;


use DateTime;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BoardPassRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Board
 */
class BoardPassRequest implements IRequest
{
    /**
     * @JMS\SerializedName("DateDeparture")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     *
     * @var null|DateTime $DateDeparture
     */
    protected $DateDeparture;
    /**
     * @JMS\SerializedName("StationCode")
     * @JMS\Type("string")
     *
     * @var null|string $StationCode
     */
    protected $StationCode;
    /**
     * @JMS\SerializedName("TicketExpressId")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Report\Board\TicketExpress")
     *
     * @var null|TicketExpress $TicketExpressId
     */
    protected $TicketExpressId;
    /**
     * @JMS\SerializedName("PassengerDocument")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Report\Board\PassengerDocument")
     * @var null|PassengerDocument $PassengerDocument
     */
    protected $PassengerDocument;

    /**
     * @return DateTime|null
     */
    public function getDateDeparture(): ?DateTime
    {
        return $this->DateDeparture;
    }

    /**
     * @param DateTime|null $DateDeparture
     * @return BoardPassRequest
     */
    public function setDateDeparture(?DateTime $DateDeparture): BoardPassRequest
    {
        $this->DateDeparture = $DateDeparture;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStationCode(): ?string
    {
        return $this->StationCode;
    }

    /**
     * @param string|null $StationCode
     * @return BoardPassRequest
     */
    public function setStationCode(?string $StationCode): BoardPassRequest
    {
        $this->StationCode = $StationCode;
        return $this;
    }

    /**
     * @return TicketExpress|null
     */
    public function getTicketExpressId(): ?TicketExpress
    {
        return $this->TicketExpressId;
    }

    /**
     * @param TicketExpress|null $TicketExpressId
     * @return BoardPassRequest
     */
    public function setTicketExpressId(?TicketExpress $TicketExpressId): BoardPassRequest
    {
        $this->TicketExpressId = $TicketExpressId;
        return $this;
    }

    /**
     * @return PassengerDocument|null
     */
    public function getPassengerDocument(): ?PassengerDocument
    {
        return $this->PassengerDocument;
    }

    /**
     * @param PassengerDocument|null $PassengerDocument
     * @return BoardPassRequest
     */
    public function setPassengerDocument(?PassengerDocument $PassengerDocument): BoardPassRequest
    {
        $this->PassengerDocument = $PassengerDocument;
        return $this;
    }
}
