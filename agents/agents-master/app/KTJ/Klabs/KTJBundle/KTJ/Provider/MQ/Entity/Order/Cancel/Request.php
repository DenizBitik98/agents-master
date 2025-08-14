<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel
 */
class Request implements IRequest
{
    /**
     * @var null|OrderExpress $OrderExpressId
     */
    protected $OrderExpressId;

    /**
     * Request constructor.
     * @param OrderExpress|null $OrderExpressId
     */
    public function __construct(?OrderExpress $OrderExpressId)
    {
        $this->setOrderExpressId($OrderExpressId);
    }

    /**
     * @return OrderExpress|null
     */
    public function getOrderExpressId(): ?OrderExpress
    {
        return $this->OrderExpressId;
    }

    /**
     * @param OrderExpress|null $OrderExpressId
     * @return Request
     */
    public function setOrderExpressId(?OrderExpress $OrderExpressId): Request
    {
        $this->OrderExpressId = $OrderExpressId;

        return $this;
    }
}
