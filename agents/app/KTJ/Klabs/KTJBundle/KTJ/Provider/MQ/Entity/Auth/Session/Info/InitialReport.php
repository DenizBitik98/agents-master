<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info;

use \DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class InitialReport
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info
 */
class InitialReport
{
    /**
     * @JMS\SerializedName("TransactionId")
     * @JMS\Type("int")
     * @var null|int $TransactionId
     */
    protected $TransactionId;
    /**
     * @JMS\SerializedName("TransactionCommitted")
     * @JMS\Type("bool")
     * @var null|bool $TransactionCommitted
     */
    protected $TransactionCommitted;
    /**
     * @JMS\SerializedName("ReportTimestamp")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $ReportTimestamp
     */
    protected $ReportTimestamp;
    /**
     * @JMS\SerializedName("BlankIdentity")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Auth\Session\Info\BlankIdentity")
     * @var null|BlankIdentity $BlankIdentity
     */
    protected $BlankIdentity;
    /**
     * @JMS\SerializedName("SalePointNumber")
     * @JMS\Type("string")
     * @var null|string $SalePointNumber
     */
    protected $SalePointNumber;
    /**
     * @JMS\SerializedName("SalePointTerminalNumber")
     * @JMS\Type("string")
     * @var null|string $SalePointTerminalNumber
     */
    protected $SalePointTerminalNumber;

    /**
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return $this->TransactionId;
    }

    /**
     * @param int|null $TransactionId
     */
    public function setTransactionId(?int $TransactionId): void
    {
        $this->TransactionId = $TransactionId;
    }

    /**
     * @return bool|null
     */
    public function getTransactionCommitted(): ?bool
    {
        return $this->TransactionCommitted;
    }

    /**
     * @param bool|null $TransactionCommitted
     */
    public function setTransactionCommitted(?bool $TransactionCommitted): void
    {
        $this->TransactionCommitted = $TransactionCommitted;
    }

    /**
     * @return DateTime|null
     */
    public function getReportTimestamp(): ?DateTime
    {
        return $this->ReportTimestamp;
    }

    /**
     * @param DateTime|null $ReportTimestamp
     */
    public function setReportTimestamp(?DateTime $ReportTimestamp): void
    {
        $this->ReportTimestamp = $ReportTimestamp;
    }

    /**
     * @return BlankIdentity|null
     */
    public function getBlankIdentity(): ?BlankIdentity
    {
        return $this->BlankIdentity;
    }

    /**
     * @param BlankIdentity|null $BlankIdentity
     */
    public function setBlankIdentity(?BlankIdentity $BlankIdentity): void
    {
        $this->BlankIdentity = $BlankIdentity;
    }

    /**
     * @return string|null
     */
    public function getSalePointNumber(): ?string
    {
        return $this->SalePointNumber;
    }

    /**
     * @param string|null $SalePointNumber
     */
    public function setSalePointNumber(?string $SalePointNumber): void
    {
        $this->SalePointNumber = $SalePointNumber;
    }

    /**
     * @return string|null
     */
    public function getSalePointTerminalNumber(): ?string
    {
        return $this->SalePointTerminalNumber;
    }

    /**
     * @param string|null $SalePointTerminalNumber
     */
    public function setSalePointTerminalNumber(?string $SalePointTerminalNumber): void
    {
        $this->SalePointTerminalNumber = $SalePointTerminalNumber;
    }
}
