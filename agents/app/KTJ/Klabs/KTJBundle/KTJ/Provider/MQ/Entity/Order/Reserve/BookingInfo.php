<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve;

/**
 * Class BookingInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve
 */
class BookingInfo
{
    /**
     * @var null|int $BookingTypeSign
     */
    protected $BookingTypeSign;
    /**
     * @var null|string $BookingId
     */
    protected $BookingId;

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
    public function getBookingId(): ?string
    {
        return $this->BookingId;
    }

    /**
     * @param string|null $BookingId
     * @return BookingInfo
     */
    public function setBookingId(?string $BookingId): BookingInfo
    {
        $this->BookingId = $BookingId;

        return $this;
    }
}
