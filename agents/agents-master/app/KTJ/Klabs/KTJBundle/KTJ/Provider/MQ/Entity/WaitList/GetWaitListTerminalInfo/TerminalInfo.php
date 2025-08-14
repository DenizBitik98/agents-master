<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetWaitListTerminalInfo;

use DateTime;

/**
 * Class TerminalInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetWaitListTerminalInfo
 */
class TerminalInfo
{
    /**
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @var null|string $Name
     */
    protected $Name;
    /**
     * @var null|string $Address
     */
    protected $Address;
    /**
     * @var null|string $MachineKey
     */
    protected $MachineKey;
    /**
     * @var null|string $Location
     */
    protected $Location;
    /**
     * @var null|bool $IsActive
     */
    protected $IsActive;
    /**
     * @var null|DateTime $DateModified
     */
    protected $DateModified;
    /**
     * @var null|DateTime $CreationDate
     */
    protected $CreationDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     * @return TerminalInfo
     */
    public function setId(?int $Id): TerminalInfo
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string|null $Name
     * @return TerminalInfo
     */
    public function setName(?string $Name): TerminalInfo
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->Address;
    }

    /**
     * @param string|null $Address
     * @return TerminalInfo
     */
    public function setAddress(?string $Address): TerminalInfo
    {
        $this->Address = $Address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMachineKey(): ?string
    {
        return $this->MachineKey;
    }

    /**
     * @param string|null $MachineKey
     * @return TerminalInfo
     */
    public function setMachineKey(?string $MachineKey): TerminalInfo
    {
        $this->MachineKey = $MachineKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->Location;
    }

    /**
     * @param string|null $Location
     * @return TerminalInfo
     */
    public function setLocation(?string $Location): TerminalInfo
    {
        $this->Location = $Location;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActive(): ?bool
    {
        return $this->IsActive;
    }

    /**
     * @param bool|null $IsActive
     * @return TerminalInfo
     */
    public function setIsActive(?bool $IsActive): TerminalInfo
    {
        $this->IsActive = $IsActive;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateModified(): ?DateTime
    {
        return $this->DateModified;
    }

    /**
     * @param DateTime|null $DateModified
     * @return TerminalInfo
     */
    public function setDateModified(?DateTime $DateModified): TerminalInfo
    {
        $this->DateModified = $DateModified;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCreationDate(): ?DateTime
    {
        return $this->CreationDate;
    }

    /**
     * @param DateTime|null $CreationDate
     * @return TerminalInfo
     */
    public function setCreationDate(?DateTime $CreationDate): TerminalInfo
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }
}
