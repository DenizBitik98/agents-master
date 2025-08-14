<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Report\WaitList;

use DateTime;

/**
 * Class TerminalInformation
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Report\WaitList
 */
class TerminalInformation
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
     * @return TerminalInformation
     */
    public function setId(?int $Id): TerminalInformation
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
     * @return TerminalInformation
     */
    public function setName(?string $Name): TerminalInformation
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
     * @return TerminalInformation
     */
    public function setAddress(?string $Address): TerminalInformation
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
     * @return TerminalInformation
     */
    public function setMachineKey(?string $MachineKey): TerminalInformation
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
     * @return TerminalInformation
     */
    public function setLocation(?string $Location): TerminalInformation
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
     * @return TerminalInformation
     */
    public function setIsActive(?bool $IsActive): TerminalInformation
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
     * @return TerminalInformation
     */
    public function setDateModified(?DateTime $DateModified): TerminalInformation
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
     * @return TerminalInformation
     */
    public function setCreationDate(?DateTime $CreationDate): TerminalInformation
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }
}
