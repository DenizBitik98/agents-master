<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

/**
 * Class IssueOrderTicketCountryAdditionalInfoResponse
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class CountryAdditionalInfo
{
    /**
     * @var null|string $RailwayCode
     */
    protected $RailwayCode;
    /**
     * @var null|int $TravelDistance
     */
    protected $TravelDistance;

    /**
     * @return string|null
     */
    public function getRailwayCode(): ?string
    {
        return $this->RailwayCode;
    }

    /**
     * @param string|null $RailwayCode
     * @return CountryAdditionalInfo
     */
    public function setRailwayCode(?string $RailwayCode): CountryAdditionalInfo
    {
        $this->RailwayCode = $RailwayCode;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTravelDistance(): ?int
    {
        return $this->TravelDistance;
    }

    /**
     * @param int|null $TravelDistance
     * @return CountryAdditionalInfo
     */
    public function setTravelDistance(?int $TravelDistance): CountryAdditionalInfo
    {
        $this->TravelDistance = $TravelDistance;

        return $this;
    }
}
