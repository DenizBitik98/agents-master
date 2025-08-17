<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ParentDocument
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class ParentDocument
{
    const MODE_EXPRESS_ID = 0;
    const MODE_BLANK_ID = 1;
    /**
     * @JMS\SerializedName("Mode")
     * @JMS\Type("int")
     * @var null|int $mode
     */
    protected $mode;
    /**
     * @JMS\SerializedName("ExpressId")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ParentDocumentExpressId")
     * @var null|ParentDocumentExpressId $expressId
     */
    protected $expressId;
    /**
     * @JMS\SerializedName("BlankIdentity")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ParentDocumentExpressId")
     * @var null|ParentDocumentExpressId $blankIdentity
     */
    protected $blankIdentity;

    /**
     * @return int|null
     */
    public function getMode(): ?int
    {
        return $this->mode;
    }

    /**
     * @param int|null $mode
     * @return ParentDocument
     */
    public function setMode(?int $mode): ParentDocument
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return ParentDocumentExpressId|null
     */
    public function getExpressId(): ?ParentDocumentExpressId
    {
        return $this->expressId;
    }

    /**
     * @param ParentDocumentExpressId|null $expressId
     * @return ParentDocument
     */
    public function setExpressId(?ParentDocumentExpressId $expressId): ParentDocument
    {
        $this->expressId = $expressId;

        return $this;
    }

    /**
     * @return ParentDocumentExpressId|null
     */
    public function getBlankIdentity(): ?ParentDocumentExpressId
    {
        return $this->blankIdentity;
    }

    /**
     * @param ParentDocumentExpressId|null $blankIdentity
     * @return ParentDocument
     */
    public function setBlankIdentity(?ParentDocumentExpressId $blankIdentity): ParentDocument
    {
        $this->blankIdentity = $blankIdentity;

        return $this;
    }
}
