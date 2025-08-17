<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;

/**
 * Class Booking
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class Booking
{
    /**
     * @var null|BookingInfo $Booking
     */
    protected $Booking;
    /**
     * @var null|Info $Info
     */
    protected $Info;

    /**
     * @return BookingInfo|null
     */
    public function getBooking(): ?BookingInfo
    {
        return $this->Booking;
    }

    /**
     * @param BookingInfo|null $Booking
     * @return Booking
     */
    public function setBooking(?BookingInfo $Booking): Booking
    {
        $this->Booking = $Booking;

        return $this;
    }

    /**
     * @return Info|null
     */
    public function getInfo(): ?Info
    {
        return $this->Info;
    }

    /**
     * @param Info|null $Info
     * @return Booking
     */
    public function setInfo(?Info $Info): Booking
    {
        $this->Info = $Info;

        return $this;
    }
}
