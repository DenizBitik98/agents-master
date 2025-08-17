<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity;

use JMS\Serializer\Annotation as JMS;

class ByExpressId
{
    /**
     * @JMS\SerializedName("ExpressId")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity\ExpressId")
     * @var null|ExpressId $ExpressId
     */
    protected $ExpressId;

    /**
     * @return ExpressId|null
     */
    public function getExpressId(): ?ExpressId
    {
        return $this->ExpressId;
    }

    /**
     * @param ExpressId|null $ExpressId
     */
    public function setExpressId(?ExpressId $ExpressId): void
    {
        $this->ExpressId = $ExpressId;
    }
}
