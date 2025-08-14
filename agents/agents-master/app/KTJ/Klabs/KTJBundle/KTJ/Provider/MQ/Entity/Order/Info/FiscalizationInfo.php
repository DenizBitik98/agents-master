<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info;

use JMS\Serializer\Annotation as JMS;

class FiscalizationInfo
{
    /**
     * @JMS\SerializedName("PaymentNumber")
     * @JMS\Type("int")
     * @var null|integer $PaymentNumber
     */
    protected $PaymentNumber;

    /**
     * @return int|null
     */
    public function getPaymentNumber(): ?int
    {
        return $this->PaymentNumber;
    }

    /**
     * @param int|null $PaymentNumber
     */
    public function setPaymentNumber(?int $PaymentNumber): void
    {
        $this->PaymentNumber = $PaymentNumber;
    }
}
