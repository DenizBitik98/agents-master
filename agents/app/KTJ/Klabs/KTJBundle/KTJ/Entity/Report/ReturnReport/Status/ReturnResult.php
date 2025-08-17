<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 12:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status;

use DateTime;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ReturnResult
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status
 */
class ReturnResult {
	/**
	 * @JMS\SerializedName("Tickets")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\Ticket>")
	 * @var null|Ticket[]|Collection $Tickets
	 */
	protected $Tickets;
	/**
	 * @JMS\SerializedName("RetTariff")
	 * @JMS\Type("float")
	 * @var null|float $RetTariff
	 */
	protected $RetTariff;
	/**
	 * @JMS\SerializedName("RetTypeInfo")
	 * @JMS\Type("string")
	 * @var null|string $RetTypeInfo
	 */
	protected $RetTypeInfo;
	/**
	 * @JMS\SerializedName("OperationDateTime")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $OperationDateTime
	 */
	protected $OperationDateTime;
	/**
	 * @JMS\SerializedName("TimeBeforeDeparture")
	 * @JMS\Type("string")
	 * @var null|string $TimeBeforeDeparture
	 */
	protected $TimeBeforeDeparture;
	/**
	 * @JMS\SerializedName("PaymentType")
	 * @JMS\Type("int")
	 * @var null|int $PaymentType
	 */
	protected $PaymentType;
	/**
	 * @JMS\SerializedName("ExpressId")
	 * @JMS\Type("string")
	 * @var null|string $ExpressId
	 */
	protected $ExpressId;
	/**
	 * @JMS\SerializedName("DepartureTrainNumber")
	 * @JMS\Type("string")
	 * @var null|string $DepartureTrainNumber
	 */
	protected $DepartureTrainNumber;
	/**
	 * @JMS\SerializedName("DepartureDateTime")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $DepartureDateTime
	 */
	protected $DepartureDateTime;
	/**
	 * @JMS\SerializedName("CarNumber")
	 * @JMS\Type("string")
	 * @var null|string $CarNumber
	 */
	protected $CarNumber;
	/**
	 * @JMS\SerializedName("DepartureStation")
	 * @JMS\Type("string")
	 * @var null|string $DepartureStation
	 */
	protected $DepartureStation;
	/**
	 * @JMS\SerializedName("DepartureStationCode")
	 * @JMS\Type("string")
	 * @var null|string $DepartureStationCode
	 */
	protected $DepartureStationCode;
	/**
	 * @JMS\SerializedName("ArrivalStation")
	 * @JMS\Type("string")
	 * @var null|string $ArrivalStation
	 */
	protected $ArrivalStation;
	/**
	 * @JMS\SerializedName("ArrivalStationCode")
	 * @JMS\Type("string")
	 * @var null|string $ArrivalStationCode
	 */
	protected $ArrivalStationCode;
	/**
	 * @JMS\SerializedName("Carrier")
	 * @JMS\Type("string")
	 * @var null|string $Carrier
	 */
	protected $Carrier;
	/**
	 * @JMS\SerializedName("CarrierBin")
	 * @JMS\Type("string")
	 * @var null|string $CarrierBin
	 */
	protected $CarrierBin;
	/**
	 * @JMS\SerializedName("CarrierInn")
	 * @JMS\Type("string")
	 * @var null|string $CarrierInn
	 */
	protected $CarrierInn;
	/**
	 * @JMS\SerializedName("TerminalName")
	 * @JMS\Type("string")
	 * @var null|string $TerminalName
	 */
	protected $TerminalName;
	/**
	 * @JMS\SerializedName("CarClassService")
	 * @JMS\Type("string")
	 * @var null|string $CarClassService
	 */
	protected $CarClassService;

	/**
	 * @return Collection|Ticket[]|null
	 */
	public function getTickets() {
		return $this->Tickets;
	}

	/**
	 * @param Collection|Ticket[]|null $Tickets
	 *
	 * @return ReturnResult
	 */
	public function setTickets( $Tickets ) {
		$this->Tickets = $Tickets;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getRetTariff(): ?float {
		return $this->RetTariff;
	}

	/**
	 * @param float|null $RetTariff
	 *
	 * @return ReturnResult
	 */
	public function setRetTariff( ?float $RetTariff ): ReturnResult {
		$this->RetTariff = $RetTariff;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getRetTypeInfo(): ?string {
		return $this->RetTypeInfo;
	}

	/**
	 * @param null|string $RetTypeInfo
	 *
	 * @return ReturnResult
	 */
	public function setRetTypeInfo( ?string $RetTypeInfo ): ReturnResult {
		$this->RetTypeInfo = $RetTypeInfo;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getOperationDateTime(): ?DateTime {
		return $this->OperationDateTime;
	}

	/**
	 * @param DateTime|null $OperationDateTime
	 *
	 * @return ReturnResult
	 */
	public function setOperationDateTime( ?DateTime $OperationDateTime ): ReturnResult {
		$this->OperationDateTime = $OperationDateTime;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTimeBeforeDeparture(): ?string {
		return $this->TimeBeforeDeparture;
	}

	/**
	 * @param null|string $TimeBeforeDeparture
	 *
	 * @return ReturnResult
	 */
	public function setTimeBeforeDeparture( ?string $TimeBeforeDeparture ): ReturnResult {
		$this->TimeBeforeDeparture = $TimeBeforeDeparture;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getPaymentType(): ?int {
		return $this->PaymentType;
	}

	/**
	 * @param int|null $PaymentType
	 *
	 * @return ReturnResult
	 */
	public function setPaymentType( ?int $PaymentType ): ReturnResult {
		$this->PaymentType = $PaymentType;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getExpressId(): ?string {
		return $this->ExpressId;
	}

	/**
	 * @param null|string $ExpressId
	 *
	 * @return ReturnResult
	 */
	public function setExpressId( ?string $ExpressId ): ReturnResult {
		$this->ExpressId = $ExpressId;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getDepartureTrainNumber(): ?string {
		return $this->DepartureTrainNumber;
	}

	/**
	 * @param null|string $DepartureTrainNumber
	 *
	 * @return ReturnResult
	 */
	public function setDepartureTrainNumber( ?string $DepartureTrainNumber ): ReturnResult {
		$this->DepartureTrainNumber = $DepartureTrainNumber;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getDepartureDateTime(): ?DateTime {
		return $this->DepartureDateTime;
	}

	/**
	 * @param DateTime|null $DepartureDateTime
	 *
	 * @return ReturnResult
	 */
	public function setDepartureDateTime( ?DateTime $DepartureDateTime ): ReturnResult {
		$this->DepartureDateTime = $DepartureDateTime;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarNumber(): ?string {
		return $this->CarNumber;
	}

	/**
	 * @param null|string $CarNumber
	 *
	 * @return ReturnResult
	 */
	public function setCarNumber( ?string $CarNumber ): ReturnResult {
		$this->CarNumber = $CarNumber;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getDepartureStation(): ?string {
		return $this->DepartureStation;
	}

	/**
	 * @param null|string $DepartureStation
	 *
	 * @return ReturnResult
	 */
	public function setDepartureStation( ?string $DepartureStation ): ReturnResult {
		$this->DepartureStation = $DepartureStation;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getDepartureStationCode(): ?string {
		return $this->DepartureStationCode;
	}

	/**
	 * @param null|string $DepartureStationCode
	 *
	 * @return ReturnResult
	 */
	public function setDepartureStationCode( ?string $DepartureStationCode ): ReturnResult {
		$this->DepartureStationCode = $DepartureStationCode;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getArrivalStation(): ?string {
		return $this->ArrivalStation;
	}

	/**
	 * @param null|string $ArrivalStation
	 *
	 * @return ReturnResult
	 */
	public function setArrivalStation( ?string $ArrivalStation ): ReturnResult {
		$this->ArrivalStation = $ArrivalStation;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getArrivalStationCode(): ?string {
		return $this->ArrivalStationCode;
	}

	/**
	 * @param null|string $ArrivalStationCode
	 *
	 * @return ReturnResult
	 */
	public function setArrivalStationCode( ?string $ArrivalStationCode ): ReturnResult {
		$this->ArrivalStationCode = $ArrivalStationCode;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarrier(): ?string {
		return $this->Carrier;
	}

	/**
	 * @param null|string $Carrier
	 *
	 * @return ReturnResult
	 */
	public function setCarrier( ?string $Carrier ): ReturnResult {
		$this->Carrier = $Carrier;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarrierBin(): ?string {
		return $this->CarrierBin;
	}

	/**
	 * @param null|string $CarrierBin
	 *
	 * @return ReturnResult
	 */
	public function setCarrierBin( ?string $CarrierBin ): ReturnResult {
		$this->CarrierBin = $CarrierBin;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarrierInn(): ?string {
		return $this->CarrierInn;
	}

	/**
	 * @param null|string $CarrierInn
	 *
	 * @return ReturnResult
	 */
	public function setCarrierInn( ?string $CarrierInn ): ReturnResult {
		$this->CarrierInn = $CarrierInn;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTerminalName(): ?string {
		return $this->TerminalName;
	}

	/**
	 * @param null|string $TerminalName
	 *
	 * @return ReturnResult
	 */
	public function setTerminalName( ?string $TerminalName ): ReturnResult {
		$this->TerminalName = $TerminalName;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarClassService(): ?string {
		return $this->CarClassService;
	}

	/**
	 * @param null|string $CarClassService
	 *
	 * @return ReturnResult
	 */
	public function setCarClassService( ?string $CarClassService ): ReturnResult {
		$this->CarClassService = $CarClassService;

		return $this;
	}
}
