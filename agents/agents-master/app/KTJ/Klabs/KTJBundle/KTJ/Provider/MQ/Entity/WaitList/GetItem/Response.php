<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;


use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking\Response as ConfirmBookingResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class Response implements IResponse
{
    /**
     * @var null|Info $Info
     */
    protected $Info;
    /**
     * @var null|TripRequirement $TripRequirements
     */
    protected $TripRequirements;
    /**
     * @var null|Collection|Blank[] $Blanks
     */
    protected $Blanks;
    /**
     * @var null|array $Notifications
     */
    protected $Notifications;
    /**
     * @var null|Booking $Booking
     */
    protected $Booking;
    /**
     * @var null|ConfirmBookingResponse $Order
     */
    protected $Order;

    /**
     * @return Info|null
     */
    public function getInfo(): ?Info
    {
        return $this->Info;
    }

    /**
     * @param Info|null $Info
     * @return Response
     */
    public function setInfo(?Info $Info): Response
    {
        $this->Info = $Info;

        return $this;
    }

    /**
     * @return TripRequirement|null
     */
    public function getTripRequirements(): ?TripRequirement
    {
        return $this->TripRequirements;
    }

    /**
     * @param TripRequirement|null $TripRequirements
     * @return Response
     */
    public function setTripRequirements(?TripRequirement $TripRequirements): Response
    {
        $this->TripRequirements = $TripRequirements;

        return $this;
    }

    /**
     * @return Collection|Blank[]|null
     */
    public function getBlanks()
    {
        return $this->Blanks;
    }

    /**
     * @param Collection|Blank[]|null $Blanks
     * @return Response
     */
    public function setBlanks($Blanks)
    {
        $this->Blanks = $Blanks;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getNotifications(): ?array
    {
        return $this->Notifications;
    }

    /**
     * @param array|null $Notifications
     * @return Response
     */
    public function setNotifications(?array $Notifications): Response
    {
        $this->Notifications = $Notifications;

        return $this;
    }

    /**
     * @return Booking|null
     */
    public function getBooking(): ?Booking
    {
        return $this->Booking;
    }

    /**
     * @param Booking|null $Booking
     * @return Response
     */
    public function setBooking(?Booking $Booking): Response
    {
        $this->Booking = $Booking;

        return $this;
    }

    /**
     * @return ConfirmBookingResponse|null
     */
    public function getOrder(): ?ConfirmBookingResponse
    {
        return $this->Order;
    }

    /**
     * @param ConfirmBookingResponse|null $Order
     * @return Response
     */
    public function setOrder(?ConfirmBookingResponse $Order): Response
    {
        $this->Order = $Order;

        return $this;
    }
}
