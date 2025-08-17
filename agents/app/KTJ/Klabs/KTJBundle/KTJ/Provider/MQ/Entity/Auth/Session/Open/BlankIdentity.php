<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open;

/**
 * Class BlankIdentity
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Open
 */
class BlankIdentity
{
    /**
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
     * @return BlankIdentity
     */
    public function setValue(?string $Value): BlankIdentity
    {
        $this->Value = $Value;

        return $this;
    }
}
