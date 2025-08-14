<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

class GetOrderInfoRequest implements IRequest
{
    /**
     * @JMS\SerializedName("ExpressId")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info\GetOrderInfoRequestExpressId")
     * @var null|GetOrderInfoRequestExpressId $ExpressId
     */
    protected $ExpressId;

    /**
     * @return GetOrderInfoRequestExpressId|null
     */
    public function getExpressId(): ?GetOrderInfoRequestExpressId
    {
        return $this->ExpressId;
    }

    /**
     * @param GetOrderInfoRequestExpressId|null $ExpressId
     */
    public function setExpressId(?GetOrderInfoRequestExpressId $ExpressId): void
    {
        $this->ExpressId = $ExpressId;
    }
}
