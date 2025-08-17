<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal;


use Application\Sonata\ClassificationBundle\Entity\Collection;
use JMS\Serializer\Annotation as JMS;


class BlanksInfo
{
    /**
     * @JMS\SerializedName("Blanks")
     * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Provider\MQ\Entity\SeatReserve\IssueOrderExternal\Blank>")
     * @var null|Collection|Blank[] $Blanks
     */
    protected $Blanks;

    /**
     * @return Blank[]|Collection|null
     */
    public function getBlanks(): ?array
    {
        return $this->Blanks;
    }

    /**
     * @param Collection|Blank[]|null $Blanks
     */
    public function setBlanks($Blanks): void
    {
        $this->Blanks = $Blanks;
    }
}
