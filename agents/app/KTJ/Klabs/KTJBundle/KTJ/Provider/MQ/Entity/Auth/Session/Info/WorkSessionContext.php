<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info;

use \DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class WorkSessionContext
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info
 */
class WorkSessionContext
{
    /**
     * @JMS\SerializedName("Id")
     * @JMS\Type("int")
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @JMS\SerializedName("UserId")
     * @JMS\Type("int")
     * @var null|int $UserId
     */
    protected $UserId;
    /**
     * @JMS\SerializedName("TerminalId")
     * @JMS\Type("int")
     * @var null|int $TerminalId
     */
    protected $TerminalId;
    /**
     * @JMS\SerializedName("StartTimestamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $StartTimestamp
     */
    protected $StartTimestamp;
    /**
     * @JMS\SerializedName("FinishTimestamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $FinishTimestamp
     */
    protected $FinishTimestamp;
    /**
     * @JMS\SerializedName("UniversalFormAllowed")
     * @JMS\Type("bool")
     * @var null|bool $UniversalFormAllowed
     */
    protected $UniversalFormAllowed;
    /**
     * @JMS\SerializedName("FksNumber")
     * @JMS\Type("string")
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
     */
    public function setId(?int $Id): void
    {
        $this->Id = $Id;
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
     */
    public function setUserId(?int $UserId): void
    {
        $this->UserId = $UserId;
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
     */
    public function setTerminalId(?int $TerminalId): void
    {
        $this->TerminalId = $TerminalId;
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
     */
    public function setStartTimestamp(?DateTime $StartTimestamp): void
    {
        $this->StartTimestamp = $StartTimestamp;
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
     */
    public function setFinishTimestamp(?DateTime $FinishTimestamp): void
    {
        $this->FinishTimestamp = $FinishTimestamp;
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
     */
    public function setUniversalFormAllowed(?bool $UniversalFormAllowed): void
    {
        $this->UniversalFormAllowed = $UniversalFormAllowed;
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
     */
    public function setFksNumber(?string $FksNumber): void
    {
        $this->FksNumber = $FksNumber;
    }
}
