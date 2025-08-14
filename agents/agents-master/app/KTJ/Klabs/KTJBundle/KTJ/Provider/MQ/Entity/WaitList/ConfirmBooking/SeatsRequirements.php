<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;

/**
 * Class ConfirmBookingSeatsRequirementsRequest
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class SeatsRequirements
{
    /**
     * @var null|bool $WithoutBedding
     */
    protected $WithoutBedding;

    /**
     * @return bool|null
     */
    public function getWithoutBedding(): ?bool
    {
        return $this->WithoutBedding;
    }

    /**
     * @param bool|null $WithoutBedding
     * @return SeatsRequirements
     */
    public function setWithoutBedding(?bool $WithoutBedding): SeatsRequirements
    {
        $this->WithoutBedding = $WithoutBedding;

        return $this;
    }
}
