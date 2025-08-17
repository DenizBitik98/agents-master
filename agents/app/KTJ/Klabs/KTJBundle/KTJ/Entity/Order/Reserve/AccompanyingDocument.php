<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AccompanyingDocument
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class AccompanyingDocument
{
    /**
     * @JMS\SerializedName("DocumentNumber")
     * @JMS\Type("string")
     * @var null|string $documentNumber
     */
    protected $documentNumber;

    /**
     * @return string|null
     */
    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }

    /**
     * @param string|null $documentNumber
     * @return AccompanyingDocument
     */
    public function setDocumentNumber(?string $documentNumber): AccompanyingDocument
    {
        $this->documentNumber = $documentNumber;

        return $this;
    }
}
