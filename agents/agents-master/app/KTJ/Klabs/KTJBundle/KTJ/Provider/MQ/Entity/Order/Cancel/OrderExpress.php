<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel;

/**
 * Class OrderExpress
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel
 */
class OrderExpress
{
    /**
     * @var null|string $Value
     */
    protected $Value;

    /**
     * OrderExpress constructor.
     * @param string|null $Value
     */
    public function __construct(?string $Value)
    {
        $this->setValue($Value);
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->Value;
    }

    /**
     * @param string|null $Value
     * @return OrderExpress
     */
    public function setValue(?string $Value): OrderExpress
    {
        $this->Value = $Value;

        return $this;
    }
}
