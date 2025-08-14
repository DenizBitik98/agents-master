<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

use DateTime;

/**
 * Class AdditionalServiceInfoResponse
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class AdditionalServiceInfoResponse
{
    /**
     * @var null|int $Id
     */
    protected $Id;
    /**
     * @var null|string $ServiceIdentity
     */
    protected $ServiceIdentity;
    /**
     * @var null|float $Tariff
     */
    protected $Tariff;
    /**
     * @var null|string $FiscalNumber
     */
    protected $FiscalNumber;
    /**
     * @var null|string $TerminalZNKKM
     */
    protected $TerminalZNKKM;
    /**
     * @var null|string $BaseDocumentIdentity
     */
    protected $BaseDocumentIdentity;
    /**
     * @var null|int $AdditionalServiceType
     */
    protected $AdditionalServiceType;
    /**
     * @var null|int $TimeBounds
     */
    protected $TimeBounds;
    /**
     * @var null|int $ServiceQuantity
     */
    protected $ServiceQuantity;
    /**
     * @var null|DateTime $StartTimestamp
     */
    protected $StartTimestamp;
    /**
     * @var null|DateTime $EndTimestamp
     */
    protected $EndTimestamp;
    /**
     * @var null|int $PaymentType
     */
    protected $PaymentType;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @param int|null $Id
     * @return AdditionalServiceInfoResponse
     */
    public function setId(?int $Id): AdditionalServiceInfoResponse
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getServiceIdentity(): ?string
    {
        return $this->ServiceIdentity;
    }

    /**
     * @param string|null $ServiceIdentity
     * @return AdditionalServiceInfoResponse
     */
    public function setServiceIdentity(?string $ServiceIdentity): AdditionalServiceInfoResponse
    {
        $this->ServiceIdentity = $ServiceIdentity;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTariff(): ?float
    {
        return $this->Tariff;
    }

    /**
     * @param float|null $Tariff
     * @return AdditionalServiceInfoResponse
     */
    public function setTariff(?float $Tariff): AdditionalServiceInfoResponse
    {
        $this->Tariff = $Tariff;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFiscalNumber(): ?string
    {
        return $this->FiscalNumber;
    }

    /**
     * @param string|null $FiscalNumber
     * @return AdditionalServiceInfoResponse
     */
    public function setFiscalNumber(?string $FiscalNumber): AdditionalServiceInfoResponse
    {
        $this->FiscalNumber = $FiscalNumber;

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
     * @return AdditionalServiceInfoResponse
     */
    public function setTerminalZNKKM(?string $TerminalZNKKM): AdditionalServiceInfoResponse
    {
        $this->TerminalZNKKM = $TerminalZNKKM;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBaseDocumentIdentity(): ?string
    {
        return $this->BaseDocumentIdentity;
    }

    /**
     * @param string|null $BaseDocumentIdentity
     * @return AdditionalServiceInfoResponse
     */
    public function setBaseDocumentIdentity(?string $BaseDocumentIdentity): AdditionalServiceInfoResponse
    {
        $this->BaseDocumentIdentity = $BaseDocumentIdentity;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAdditionalServiceType(): ?int
    {
        return $this->AdditionalServiceType;
    }

    /**
     * @param int|null $AdditionalServiceType
     * @return AdditionalServiceInfoResponse
     */
    public function setAdditionalServiceType(?int $AdditionalServiceType): AdditionalServiceInfoResponse
    {
        $this->AdditionalServiceType = $AdditionalServiceType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTimeBounds(): ?int
    {
        return $this->TimeBounds;
    }

    /**
     * @param int|null $TimeBounds
     * @return AdditionalServiceInfoResponse
     */
    public function setTimeBounds(?int $TimeBounds): AdditionalServiceInfoResponse
    {
        $this->TimeBounds = $TimeBounds;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getServiceQuantity(): ?int
    {
        return $this->ServiceQuantity;
    }

    /**
     * @param int|null $ServiceQuantity
     * @return AdditionalServiceInfoResponse
     */
    public function setServiceQuantity(?int $ServiceQuantity): AdditionalServiceInfoResponse
    {
        $this->ServiceQuantity = $ServiceQuantity;

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
     * @return AdditionalServiceInfoResponse
     */
    public function setStartTimestamp(?DateTime $StartTimestamp): AdditionalServiceInfoResponse
    {
        $this->StartTimestamp = $StartTimestamp;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getEndTimestamp(): ?DateTime
    {
        return $this->EndTimestamp;
    }

    /**
     * @param DateTime|null $EndTimestamp
     * @return AdditionalServiceInfoResponse
     */
    public function setEndTimestamp(?DateTime $EndTimestamp): AdditionalServiceInfoResponse
    {
        $this->EndTimestamp = $EndTimestamp;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentType(): ?int
    {
        return $this->PaymentType;
    }

    /**
     * @param int|null $PaymentType
     * @return AdditionalServiceInfoResponse
     */
    public function setPaymentType(?int $PaymentType): AdditionalServiceInfoResponse
    {
        $this->PaymentType = $PaymentType;

        return $this;
    }
}
