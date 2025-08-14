<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;


use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class Response implements IResponse
{
    /**
     * @var null|ItemInfo $Info
     */
    protected $Info;
    /**
     * @var null|TripRequirement $TripRequirements
     */
    protected $TripRequirements;
    /**
     * @var null|BlankInfo[]|Collection $Blanks
     */
    protected $Blanks;
    /**
     * @var null|Order $Order
     */
    protected $Order;

    /**
     * @return ItemInfo|null
     */
    public function getInfo(): ?ItemInfo
    {
        return $this->Info;
    }

    /**
     * @param ItemInfo|null $Info
     * @return Response
     */
    public function setInfo(?ItemInfo $Info): Response
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
     * @return Collection|BlankInfo[]|null
     */
    public function getBlanks()
    {
        return $this->Blanks;
    }

    /**
     * @param Collection|BlankInfo[]|null $Blanks
     * @return Response
     */
    public function setBlanks($Blanks)
    {
        $this->Blanks = $Blanks;

        return $this;
    }

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->Order;
    }

    /**
     * @param Order|null $Order
     * @return Response
     */
    public function setOrder(?Order $Order): Response
    {
        $this->Order = $Order;

        return $this;
    }
}
