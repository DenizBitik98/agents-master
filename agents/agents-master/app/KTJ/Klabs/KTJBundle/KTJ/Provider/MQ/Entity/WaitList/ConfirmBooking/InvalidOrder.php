<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;

/**
 * Class InvalidOrder
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class InvalidOrder
{
    /**
     * @var null|int $Reason
     */
    protected $Reason;

    /**
     * @return int|null
     */
    public function getReason(): ?int
    {
        return $this->Reason;
    }

    /**
     * @param int|null $Reason
     * @return InvalidOrder
     */
    public function setReason(?int $Reason): InvalidOrder
    {
        $this->Reason = $Reason;

        return $this;
    }
}
