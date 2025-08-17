<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info;

use JMS\Serializer\Annotation as JMS;

class ReferenceInfo
{
    /**
     * @JMS\SerializedName("ReferenceCode")
     * @JMS\Type("int")
     * @var null|integer $ReferenceCode
     */
    protected $ReferenceCode;

    /**
     * @return int|null
     */
    public function getReferenceCode(): ?int
    {
        return $this->ReferenceCode;
    }

    /**
     * @param int|null $ReferenceCode
     */
    public function setReferenceCode(?int $ReferenceCode): void
    {
        $this->ReferenceCode = $ReferenceCode;
    }
}
