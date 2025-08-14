<?php

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Carrier
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class ConsumerServices
{
    /**
     * @JMS\SerializedName("CashReceiptUrl")
     * @JMS\Type("string")
     * @var null|string $CashReceiptUrl
     */
    protected $CashReceiptUrl;
    /**
     * @JMS\SerializedName("CarryOnBaggageUrl")
     * @JMS\Type("string")
     * @var null|string $CarryOnBaggageUrl
     */
    protected $CarryOnBaggageUrl;

    /**
     * @return string|null
     */
    public function getCashReceiptUrl(): ?string
    {
        return $this->CashReceiptUrl;
    }

    /**
     * @param string|null $CashReceiptUrl
     * @return ConsumerServices
     */
    public function setCashReceiptUrl(?string $CashReceiptUrl): ConsumerServices
    {
        $this->CashReceiptUrl = $CashReceiptUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarryOnBaggageUrl(): ?string
    {
        return $this->CarryOnBaggageUrl;
    }

    /**
     * @param string|null $CarryOnBaggageUrl
     * @return ConsumerServices
     */
    public function setCarryOnBaggageUrl(?string $CarryOnBaggageUrl): ConsumerServices
    {
        $this->CarryOnBaggageUrl = $CarryOnBaggageUrl;

        return $this;
    }
}
