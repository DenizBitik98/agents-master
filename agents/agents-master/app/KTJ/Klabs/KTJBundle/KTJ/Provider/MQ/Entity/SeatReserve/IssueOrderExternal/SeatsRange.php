<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;

use JMS\Serializer\Annotation as JMS;

class SeatsRange
{
    /**
     * @JMS\SerializedName("From")
     * @JMS\Type("int")
     * @var null|int $From
     */
    protected $From;
    /**
     * @JMS\SerializedName("To")
     * @JMS\Type("int")
     * @var null|int $To
     */
    protected $To;

    /**
     * @return int|null
     */
    public function getFrom(): ?int
    {
        return $this->From;
    }

    /**
     * @param int|null $From
     */
    public function setFrom(?int $From): void
    {
        $this->From = $From;
    }

    /**
     * @return int|null
     */
    public function getTo(): ?int
    {
        return $this->To;
    }

    /**
     * @param int|null $To
     */
    public function setTo(?int $To): void
    {
        $this->To = $To;
    }
}
