<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize;


use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize
 */
class Request implements IRequest
{
    /**
     * @var null|OrderExpress $OrderExpressId
     */
    protected $OrderExpressId;
    /**
     * @var null|Collection|Payment[] $Payments
     */
    protected $Payments;

    /**
     * Request constructor.
     * @param OrderExpress|null $OrderExpressId
     * @param null $Payments
     */
    public function __construct(?OrderExpress $OrderExpressId = null, $Payments = null)
    {
        $this->setOrderExpressId($OrderExpressId);
        $this->setPayments($Payments);
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

    /**
     * @return Collection|Payment[]|null
     */
    public function getPayments()
    {
        return $this->Payments;
    }

    /**
     * @param Collection|Payment[]|null $Payments
     * @return Request
     */
    public function setPayments($Payments)
    {
        $this->Payments = $Payments;

        return $this;
    }
}
