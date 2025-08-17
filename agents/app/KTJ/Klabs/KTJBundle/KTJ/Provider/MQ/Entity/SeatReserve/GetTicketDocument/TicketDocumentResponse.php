<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TicketDocumentResponse
 * @package Passenger\SeatReserveBundle\Model\Response
 */
class TicketDocumentResponse implements IResponse
{
    /**
     * @JMS\SerializedName("Id")
     * @JMS\Type("int")
     * @var null|int $id
     */
    protected $id;
    /**
     * @JMS\SerializedName("secret")
     * @JMS\Type("string")
     * @var null|string $secret
     */
    protected $secret = "";
    /**
     * @JMS\SerializedName("TicketDocumentTripInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument\TicketDocumentTripInfo")
     * @var null|TicketDocumentTripInfo $TicketDocumentTripInfo
     */
    protected $TicketDocumentTripInfo;
    /**
     * @JMS\SerializedName("Seats")
     * @JMS\Type("ArrayCollection<int>")
     * @var null|Collection $Seats
     */
    protected $Seats;
    /**
     * @JMS\SerializedName("Reservation")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument\Reservation")
     * @var null|Reservation $Reservation
     */
    protected $Reservation;
    /**
     * @JMS\SerializedName("TicketDocumentPassengers")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\GetTicketDocument\TicketDocumentPassengers>")
     * @var null|Collection|TicketDocumentPassengers[] $TicketDocumentPassengers
     */
    protected $TicketDocumentPassengers = [];

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     */
    public function setSecret(?string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * @return TicketDocumentTripInfo|null
     */
    public function getTicketDocumentTripInfo(): ?TicketDocumentTripInfo
    {
        return $this->TicketDocumentTripInfo;
    }

    /**
     * @param TicketDocumentTripInfo|null $TicketDocumentTripInfo
     */
    public function setTicketDocumentTripInfo(?TicketDocumentTripInfo $TicketDocumentTripInfo): void
    {
        $this->TicketDocumentTripInfo = $TicketDocumentTripInfo;
    }

    /**
     * @return Collection|null
     */
    public function getSeats(): ?Collection
    {
        return $this->Seats;
    }

    /**
     * @param Collection|null $Seats
     */
    public function setSeats(?Collection $Seats): void
    {
        $this->Seats = $Seats;
    }

    /**
     * @return Reservation|null
     */
    public function getReservation(): ?Reservation
    {
        return $this->Reservation;
    }

    /**
     * @param Reservation|null $Reservation
     */
    public function setReservation(?Reservation $Reservation): void
    {
        $this->Reservation = $Reservation;
    }

    /**
     * @return TicketDocumentPassengers[]|Collection|null
     */
    public function getTicketDocumentPassengers()
    {
        return $this->TicketDocumentPassengers;
    }

    /**
     * @param TicketDocumentPassengers[]|Collection|null $TicketDocumentPassengers
     */
    public function setTicketDocumentPassengers($TicketDocumentPassengers): void
    {
        $this->TicketDocumentPassengers = $TicketDocumentPassengers;
    }
}
