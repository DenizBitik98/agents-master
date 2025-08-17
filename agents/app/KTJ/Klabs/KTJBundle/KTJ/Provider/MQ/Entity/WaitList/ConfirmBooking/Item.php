<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;

/**
 * Class Item
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class Item
{
    /**
     * @var null|int $Identity
     */
    protected $Identity;
    /**
     * @var null|string $ProtectionCode
     */
    protected $ProtectionCode;

    /**
     * Item constructor.
     * @param int|null $Identity
     * @param string|null $ProtectionCode
     */
    public function __construct(?int $Identity = null, ?string $ProtectionCode = null)
    {
        $this->setIdentity($Identity);
        $this->setProtectionCode($ProtectionCode);
    }

    /**
     * @return int|null
     */
    public function getIdentity(): ?int
    {
        return $this->Identity;
    }

    /**
     * @param int|null $Identity
     * @return Item
     */
    public function setIdentity(?int $Identity): Item
    {
        $this->Identity = $Identity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProtectionCode(): ?string
    {
        return $this->ProtectionCode;
    }

    /**
     * @param string|null $ProtectionCode
     * @return Item
     */
    public function setProtectionCode(?string $ProtectionCode): Item
    {
        $this->ProtectionCode = $ProtectionCode;

        return $this;
    }
}
