<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnTickets;


use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\OrderInfo\OrderInfo;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\ReturnInfo\ReturnInfo;

/**
 * Class ReturnTicketsResponse
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\OrderReturn\ReturnTickets
 */
class ReturnTicketsResponse implements IResponse
{
    /**
     * @JMS\SerializedName("TransactionId")
     * @JMS\Type("string")
     * @var null|string $TransactionId
     */
    protected $TransactionId;
    /**
     * @JMS\SerializedName("ReturnId")
     * @JMS\Type("int")
     * @var null|integer $ReturnId
     */
    protected $ReturnId;
    /**
     * @JMS\SerializedName("ReturnInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\ReturnInfo\ReturnInfo")
     * @var null|ReturnInfo $ReturnInfo
     */
    protected $ReturnInfo;
    /**
     * @JMS\SerializedName("OrderInfo")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\OrderInfo\OrderInfo")
     * @var null|OrderInfo $OrderInfo
     */
    protected $OrderInfo;

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->TransactionId;
    }

    /**
     * @param string|null $TransactionId
     */
    public function setTransactionId(?string $TransactionId): void
    {
        $this->TransactionId = $TransactionId;
    }

    /**
     * @return int|null
     */
    public function getReturnId(): ?int
    {
        return $this->ReturnId;
    }

    /**
     * @param int|null $ReturnId
     */
    public function setReturnId(?int $ReturnId): void
    {
        $this->ReturnId = $ReturnId;
    }

    /**
     * @return OrderInfo|null
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->OrderInfo;
    }

    /**
     * @param OrderInfo|null $OrderInfo
     */
    public function setOrderInfo(?OrderInfo $OrderInfo): void
    {
        $this->OrderInfo = $OrderInfo;
    }

    /**
     * @return ReturnInfo|null
     */
    public function getReturnInfo(): ?ReturnInfo
    {
        return $this->ReturnInfo;
    }

    /**
     * @param ReturnInfo|null $ReturnInfo
     */
    public function setReturnInfo(?ReturnInfo $ReturnInfo): void
    {
        $this->ReturnInfo = $ReturnInfo;
    }
}
