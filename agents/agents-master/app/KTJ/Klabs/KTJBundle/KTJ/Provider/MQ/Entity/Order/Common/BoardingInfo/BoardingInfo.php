<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BoardingInfo;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class BoardingInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\BoardingInfo
 */
class BoardingInfo
{
    /**
     * @JMS\SerializedName("BoardedTicketExpressIds")
     * @JMS\Type("ArrayCollection<string>")
     * @var null|Collection $BoardedTicketExpressIds
     */
    protected $BoardedTicketExpressIds;

    /**
     * @return Collection|null
     */
    public function getBoardedTicketExpressIds(): ?Collection
    {
        return $this->BoardedTicketExpressIds;
    }

    /**
     * @param Collection|null $BoardedTicketExpressIds
     */
    public function setBoardedTicketExpressIds(?Collection $BoardedTicketExpressIds): void
    {
        $this->BoardedTicketExpressIds = $BoardedTicketExpressIds;
    }
}
