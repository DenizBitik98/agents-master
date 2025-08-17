<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common\Identity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ExpressId
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Common
 */
class ExpressId
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
