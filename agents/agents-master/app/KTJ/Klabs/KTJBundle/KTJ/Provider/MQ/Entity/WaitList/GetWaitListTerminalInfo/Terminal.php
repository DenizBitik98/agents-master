<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetWaitListTerminalInfo;

/**
 * Class Terminal
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetWaitListTerminalInfo
 */
class Terminal
{
    /**
     * @var null|TerminalInfo $Terminal
     */
    protected $Terminal;
    /**
     * @var null|bool $RequestWaitlistItemFunction
     */
    protected $RequestWaitlistItemFunction;
    /**
     * @var null|bool $ConfirmBookingFunction
     */
    protected $ConfirmBookingFunction;

    /**
     * @return TerminalInfo|null
     */
    public function getTerminal(): ?TerminalInfo
    {
        return $this->Terminal;
    }

    /**
     * @param TerminalInfo|null $Terminal
     * @return Terminal
     */
    public function setTerminal(?TerminalInfo $Terminal): Terminal
    {
        $this->Terminal = $Terminal;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestWaitlistItemFunction(): ?bool
    {
        return $this->RequestWaitlistItemFunction;
    }

    /**
     * @param bool|null $RequestWaitlistItemFunction
     * @return Terminal
     */
    public function setRequestWaitlistItemFunction(?bool $RequestWaitlistItemFunction): Terminal
    {
        $this->RequestWaitlistItemFunction = $RequestWaitlistItemFunction;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getConfirmBookingFunction(): ?bool
    {
        return $this->ConfirmBookingFunction;
    }

    /**
     * @param bool|null $ConfirmBookingFunction
     * @return Terminal
     */
    public function setConfirmBookingFunction(?bool $ConfirmBookingFunction): Terminal
    {
        $this->ConfirmBookingFunction = $ConfirmBookingFunction;

        return $this;
    }
}
