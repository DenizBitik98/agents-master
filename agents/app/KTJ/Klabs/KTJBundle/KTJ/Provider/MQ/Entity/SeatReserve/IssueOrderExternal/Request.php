<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use JMS\Serializer\Annotation as JMS;

class Request implements IRequest
{
    /**
     * @JMS\SerializedName("StopoverId")
     * @JMS\Type("int")
     * @var null|int $StopoverId
     */
    protected $StopoverId;
    /**
     * @JMS\SerializedName("IssuanceRequest")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\IssuanceRequest")
     * @var null|IssuanceRequest $IssuanceRequest
     */
    protected $IssuanceRequest;
    /**
     * @JMS\SerializedName("SeatsRequirements")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\SeatsRequirements")
     * @var null|SeatsRequirements $SeatsRequirements
     */
    protected $SeatsRequirements;
    /**
     * @JMS\SerializedName("BlanksInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\BlanksInfo")
     * @var null|BlanksInfo $BlanksInfo
     */
    protected $BlanksInfo;
    /**
     * @JMS\SerializedName("SeatReservation")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\SeatReservation")
     * @var null|SeatReservation $SeatReservation
     */
    protected $SeatReservation;

    /**
     * @return int|null
     */
    public function getStopoverId(): ?int
    {
        return $this->StopoverId;
    }

    /**
     * @param int|null $StopoverId
     */
    public function setStopoverId(?int $StopoverId): void
    {
        $this->StopoverId = $StopoverId;
    }

    /**
     * @return IssuanceRequest|null
     */
    public function getIssuanceRequest(): ?IssuanceRequest
    {
        return $this->IssuanceRequest;
    }

    /**
     * @param IssuanceRequest|null $IssuanceRequest
     */
    public function setIssuanceRequest(?IssuanceRequest $IssuanceRequest): void
    {
        $this->IssuanceRequest = $IssuanceRequest;
    }

    /**
     * @return SeatsRequirements|null
     */
    public function getSeatsRequirements(): ?SeatsRequirements
    {
        return $this->SeatsRequirements;
    }

    /**
     * @param SeatsRequirements|null $SeatsRequirements
     */
    public function setSeatsRequirements(?SeatsRequirements $SeatsRequirements): void
    {
        $this->SeatsRequirements = $SeatsRequirements;
    }

    /**
     * @return BlanksInfo|null
     */
    public function getBlanksInfo(): ?BlanksInfo
    {
        return $this->BlanksInfo;
    }

    /**
     * @param BlanksInfo|null $BlanksInfo
     */
    public function setBlanksInfo(?BlanksInfo $BlanksInfo): void
    {
        $this->BlanksInfo = $BlanksInfo;
    }

    /**
     * @return SeatReservation|null
     */
    public function getSeatReservation(): ?SeatReservation
    {
        return $this->SeatReservation;
    }

    /**
     * @param SeatReservation|null $SeatReservation
     */
    public function setSeatReservation(?SeatReservation $SeatReservation): void
    {
        $this->SeatReservation = $SeatReservation;
    }
}
