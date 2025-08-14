<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;

/**
 * Class BookingInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class BookingInfo
{
    /**
     * @var null|int $BookingTypeSign
     */
    protected $BookingTypeSign;
    /**
     * @var null|string $BookingIdentity
     */
    protected $BookingIdentity;

    /**
     * @return int|null
     */
    public function getBookingTypeSign(): ?int
    {
        return $this->BookingTypeSign;
    }

    /**
     * @param int|null $BookingTypeSign
     * @return BookingInfo
     */
    public function setBookingTypeSign(?int $BookingTypeSign): BookingInfo
    {
        $this->BookingTypeSign = $BookingTypeSign;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBookingIdentity(): ?string
    {
        return $this->BookingIdentity;
    }

    /**
     * @param string|null $BookingIdentity
     * @return BookingInfo
     */
    public function setBookingIdentity(?string $BookingIdentity): BookingInfo
    {
        $this->BookingIdentity = $BookingIdentity;

        return $this;
    }
}
