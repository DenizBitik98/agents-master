<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close;


use DateTime;

/**
 * Class WorkSessionContext
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Close
 */
class WorkSessionContext
{
    /**
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @var null|int $UserId
     */
    protected $UserId;
    /**
     * @var null|int $TerminalId
     */
    protected $TerminalId;
    /**
     * @var null|DateTime $StartTimestamp
     */
    protected $StartTimestamp;
    /**
     * @var null|DateTime $FinishTimestamp
     */
    protected $FinishTimestamp;
    /**
     * @var null|bool $UniversalFormAllowed
     */
    protected $UniversalFormAllowed;
    /**
     * @var null|string $FksNumber
     */
    protected $FksNumber;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     * @return WorkSessionContext
     */
    public function setId(?int $Id): WorkSessionContext
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->UserId;
    }

    /**
     * @param int|null $UserId
     * @return WorkSessionContext
     */
    public function setUserId(?int $UserId): WorkSessionContext
    {
        $this->UserId = $UserId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTerminalId(): ?int
    {
        return $this->TerminalId;
    }

    /**
     * @param int|null $TerminalId
     * @return WorkSessionContext
     */
    public function setTerminalId(?int $TerminalId): WorkSessionContext
    {
        $this->TerminalId = $TerminalId;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getStartTimestamp(): ?DateTime
    {
        return $this->StartTimestamp;
    }

    /**
     * @param DateTime|null $StartTimestamp
     * @return WorkSessionContext
     */
    public function setStartTimestamp(?DateTime $StartTimestamp): WorkSessionContext
    {
        $this->StartTimestamp = $StartTimestamp;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getFinishTimestamp(): ?DateTime
    {
        return $this->FinishTimestamp;
    }

    /**
     * @param DateTime|null $FinishTimestamp
     * @return WorkSessionContext
     */
    public function setFinishTimestamp(?DateTime $FinishTimestamp): WorkSessionContext
    {
        $this->FinishTimestamp = $FinishTimestamp;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getUniversalFormAllowed(): ?bool
    {
        return $this->UniversalFormAllowed;
    }

    /**
     * @param bool|null $UniversalFormAllowed
     * @return WorkSessionContext
     */
    public function setUniversalFormAllowed(?bool $UniversalFormAllowed): WorkSessionContext
    {
        $this->UniversalFormAllowed = $UniversalFormAllowed;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFksNumber(): ?string
    {
        return $this->FksNumber;
    }

    /**
     * @param string|null $FksNumber
     * @return WorkSessionContext
     */
    public function setFksNumber(?string $FksNumber): WorkSessionContext
    {
        $this->FksNumber = $FksNumber;

        return $this;
    }
}
