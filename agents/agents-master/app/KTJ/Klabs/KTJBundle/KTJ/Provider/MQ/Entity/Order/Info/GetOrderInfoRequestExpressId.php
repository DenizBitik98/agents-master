<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Info;

use JMS\Serializer\Annotation as JMS;

class GetOrderInfoRequestExpressId
{
    /**
     * @JMS\SerializedName("Value")
     * @JMS\Type("string")
     * @var null|string $OrderId
     */
    protected $Value;

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->Value;
    }

    /**
     * @param string|null $Value
     */
    public function setValue(?string $Value): void
    {
        $this->Value = $Value;
    }
}
