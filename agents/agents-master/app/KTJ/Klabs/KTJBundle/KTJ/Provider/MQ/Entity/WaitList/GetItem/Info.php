<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem;

use DateTime;

/**
 * Class Info
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetItem
 */
class Info
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
     * @var null|RequestTerminal $RequestTerminal
     */
    protected $RequestTerminal;
    /**
     * @var null|int $Status
     */
    protected $Status;
    /**
     * @var null|DateTime $ArrivalTimestamp
     */
    protected $ArrivalTimestamp;
    /**
     * @var null|string $ServiceClass
     */
    protected $ServiceClass;
    /**
     * @var null|float $ReferenceSingleTariff
     */
    protected $ReferenceSingleTariff;

    /**
     * @return int|null
     */
    public function getIdentity(): ?int
    {
        return $this->Identity;
    }

    /**
     * @param int|null $Identity
     * @return Info
     */
    public function setIdentity(?int $Identity): Info
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
     * @return Info
     */
    public function setProtectionCode(?string $ProtectionCode): Info
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
     * @return Info
     */
    public function setRequestTimestamp(?DateTime $RequestTimestamp): Info
    {
        $this->RequestTimestamp = $RequestTimestamp;

        return $this;
    }

    /**
     * @return RequestTerminal|null
     */
    public function getRequestTerminal(): ?RequestTerminal
    {
        return $this->RequestTerminal;
    }

    /**
     * @param RequestTerminal|null $RequestTerminal
     * @return Info
     */
    public function setRequestTerminal(?RequestTerminal $RequestTerminal): Info
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
     * @return Info
     */
    public function setStatus(?int $Status): Info
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getArrivalTimestamp(): ?DateTime
    {
        return $this->ArrivalTimestamp;
    }

    /**
     * @param DateTime|null $ArrivalTimestamp
     * @return Info
     */
    public function setArrivalTimestamp(?DateTime $ArrivalTimestamp): Info
    {
        $this->ArrivalTimestamp = $ArrivalTimestamp;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getServiceClass(): ?string
    {
        return $this->ServiceClass;
    }

    /**
     * @param string|null $ServiceClass
     * @return Info
     */
    public function setServiceClass(?string $ServiceClass): Info
    {
        $this->ServiceClass = $ServiceClass;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getReferenceSingleTariff(): ?float
    {
        return $this->ReferenceSingleTariff;
    }

    /**
     * @param float|null $ReferenceSingleTariff
     * @return Info
     */
    public function setReferenceSingleTariff(?float $ReferenceSingleTariff): Info
    {
        $this->ReferenceSingleTariff = $ReferenceSingleTariff;

        return $this;
    }
}
