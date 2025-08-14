<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;
use JMS\Serializer\Annotation as JMS;


class SeatReservation
{
    /**
     * @JMS\SerializedName("TicketDocumentId")
     * @JMS\Type("int")
     * @var null|int $TicketDocumentId
     */
    protected $TicketDocumentId;

    /**
     * @return int|null
     */
    public function getTicketDocumentId(): ?int
    {
        return $this->TicketDocumentId;
    }

    /**
     * @param int|null $TicketDocumentId
     */
    public function setTicketDocumentId(?int $TicketDocumentId): void
    {
        $this->TicketDocumentId = $TicketDocumentId;
    }
}
