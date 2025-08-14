<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve;

/**
 * Class TerminalInfo
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Reserve
 */
class TerminalInfo
{
    /**
     * @var null|string $TerminalName
     */
    protected $TerminalName;
    /**
     * @var null|string $TerminalZNKKM
     */
    protected $TerminalZNKKM;
    /**
     * @var null|string $BranchBIN
     */
    protected $BranchBIN;
    /**
     * @var null|string $ChannelAddress
     */
    protected $ChannelAddress;

    /**
     * @return string|null
     */
    public function getTerminalName(): ?string
    {
        return $this->TerminalName;
    }

    /**
     * @param string|null $TerminalName
     * @return TerminalInfo
     */
    public function setTerminalName(?string $TerminalName): TerminalInfo
    {
        $this->TerminalName = $TerminalName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTerminalZNKKM(): ?string
    {
        return $this->TerminalZNKKM;
    }

    /**
     * @param string|null $TerminalZNKKM
     * @return TerminalInfo
     */
    public function setTerminalZNKKM(?string $TerminalZNKKM): TerminalInfo
    {
        $this->TerminalZNKKM = $TerminalZNKKM;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBranchBIN(): ?string
    {
        return $this->BranchBIN;
    }

    /**
     * @param string|null $BranchBIN
     * @return TerminalInfo
     */
    public function setBranchBIN(?string $BranchBIN): TerminalInfo
    {
        $this->BranchBIN = $BranchBIN;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChannelAddress(): ?string
    {
        return $this->ChannelAddress;
    }

    /**
     * @param string|null $ChannelAddress
     * @return TerminalInfo
     */
    public function setChannelAddress(?string $ChannelAddress): TerminalInfo
    {
        $this->ChannelAddress = $ChannelAddress;

        return $this;
    }
}
