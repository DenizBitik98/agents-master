<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info;

use \DateTime;
use JMS\Serializer\Annotation as JMS;

class BlankIdentity
{
    /**
     * @JMS\SerializedName("Value")
     * @JMS\Type("string")
     * @var null|string $Value
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
