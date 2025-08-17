<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 1:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class PaymentInfo
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class PaymentInfo {
	/**
	 * @JMS\SerializedName("BarcodeText")
	 * @JMS\Type("string")
	 * @var null|string $BarcodeText
	 */
	protected $BarcodeText;
	/**
	 * @JMS\SerializedName("FiscalNumber")
	 * @JMS\Type("string")
	 * @var null|string $FiscalNumber
	 */
	protected $FiscalNumber;
	/**
	 * @JMS\SerializedName("PaymentNumber")
	 * @JMS\Type("string")
	 * @var null|string $PaymentNumber
	 */
	protected $PaymentNumber;
	/**
	 * @JMS\SerializedName("RNM")
	 * @JMS\Type("string")
	 * @var null|string $RNM
	 */
	protected $RNM;
	/**
	 * @JMS\SerializedName("FiscalDataOperator")
	 * @JMS\Type("string")
	 * @var null|string $FiscalDataOperator
	 */
	protected $FiscalDataOperator;
	/**
	 * @JMS\SerializedName("FiscalDocumentNumber")
	 * @JMS\Type("string")
	 * @var null|string $FiscalDocumentNumber
	 */
	protected $FiscalDocumentNumber;
    /**
     * @JMS\SerializedName("FiscalizatorType")
     * @JMS\Type("integer")
     * @var null|integer $FiscalizatorType
     */
    protected $FiscalizatorType;
    /**
     * @JMS\SerializedName("FiscalDate")
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @var null|DateTime $FiscalDate
     */
    protected $FiscalDate;
    /**
     * @JMS\SerializedName("QrCode")
     * @JMS\Type("string")
     * @var null|string $QrCode
     */
    protected $QrCode;

	/**
	 * @return null|string
	 */
	public function getBarcodeText(): ?string {
		return $this->BarcodeText;
	}

	/**
	 * @param null|string $BarcodeText
	 *
	 * @return PaymentInfo
	 */
	public function setBarcodeText( ?string $BarcodeText ): PaymentInfo {
		$this->BarcodeText = $BarcodeText;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getFiscalNumber(): ?string {
		return $this->FiscalNumber;
	}

	/**
	 * @param null|string $FiscalNumber
	 *
	 * @return PaymentInfo
	 */
	public function setFiscalNumber( ?string $FiscalNumber ): PaymentInfo {
		$this->FiscalNumber = $FiscalNumber;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPaymentNumber(): ?string {
		return $this->PaymentNumber;
	}

	/**
	 * @param null|string $PaymentNumber
	 *
	 * @return PaymentInfo
	 */
	public function setPaymentNumber( ?string $PaymentNumber ): PaymentInfo {
		$this->PaymentNumber = $PaymentNumber;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getRNM(): ?string {
		return $this->RNM;
	}

	/**
	 * @param null|string $RNM
	 *
	 * @return PaymentInfo
	 */
	public function setRNM( ?string $RNM ): PaymentInfo {
		$this->RNM = $RNM;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getFiscalDataOperator(): ?string {
		return $this->FiscalDataOperator;
	}

	/**
	 * @param null|string $FiscalDataOperator
	 *
	 * @return PaymentInfo
	 */
	public function setFiscalDataOperator( ?string $FiscalDataOperator ): PaymentInfo {
		$this->FiscalDataOperator = $FiscalDataOperator;

		return $this;
	}

    /**
     * @return string|null
     */
    public function getFiscalDocumentNumber(): ?string
    {
        return $this->FiscalDocumentNumber;
    }

    /**
     * @param string|null $FiscalDocumentNumber
     * @return PaymentInfo
     */
    public function setFiscalDocumentNumber(?string $FiscalDocumentNumber): PaymentInfo
    {
        $this->FiscalDocumentNumber = $FiscalDocumentNumber;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFiscalizatorType(): ?int
    {
        return $this->FiscalizatorType;
    }

    /**
     * @param int|null $FiscalizatorType
     * @return PaymentInfo
     */
    public function setFiscalizatorType(?int $FiscalizatorType): PaymentInfo
    {
        $this->FiscalizatorType = $FiscalizatorType;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getFiscalDate(): ?DateTime
    {
        return $this->FiscalDate;
    }

    /**
     * @param DateTime|null $FiscalDate
     * @return PaymentInfo
     */
    public function setFiscalDate(?DateTime $FiscalDate): PaymentInfo
    {
        $this->FiscalDate = $FiscalDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQrCode(): ?string
    {
        return $this->QrCode;
    }

    /**
     * @param string|null $QrCode
     * @return PaymentInfo
     */
    public function setQrCode(?string $QrCode): PaymentInfo
    {
        $this->QrCode = $QrCode;

        return $this;
    }

}
