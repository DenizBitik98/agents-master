<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

use DateTime;

/**
 * Class Info
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class ItemInfo
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
     * @var null|DateTime $RequestTimestamp
     */
    protected $RequestTimestamp;
    /**
     * @var null|Terminal $RequestTerminal
     */
    protected $RequestTerminal;
    /**
     * @var null|int $Status
     */
    protected $Status;

    /**
     * @return int|null
     */
    public function getIdentity(): ?int
    {
        return $this->Identity;
    }

    /**
     * @param int|null $Identity
     * @return ItemInfo
     */
    public function setIdentity(?int $Identity): ItemInfo
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
     * @return ItemInfo
     */
    public function setProtectionCode(?string $ProtectionCode): ItemInfo
    {
        $this->ProtectionCode = $ProtectionCode;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getRequestTimestamp(): ?DateTime
    {
        return $this->RequestTimestamp;
    }

    /**
     * @param DateTime|null $RequestTimestamp
     * @return ItemInfo
     */
    public function setRequestTimestamp(?DateTime $RequestTimestamp): ItemInfo
    {
        $this->RequestTimestamp = $RequestTimestamp;

        return $this;
    }

    /**
     * @return Terminal|null
     */
    public function getRequestTerminal(): ?Terminal
    {
        return $this->RequestTerminal;
    }

    /**
     * @param Terminal|null $RequestTerminal
     * @return ItemInfo
     */
    public function setRequestTerminal(?Terminal $RequestTerminal): ItemInfo
    {
        $this->RequestTerminal = $RequestTerminal;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->Status;
    }

    /**
     * @param int|null $Status
     * @return ItemInfo
     */
    public function setStatus(?int $Status): ItemInfo
    {
        $this->Status = $Status;

        return $this;
    }
}
