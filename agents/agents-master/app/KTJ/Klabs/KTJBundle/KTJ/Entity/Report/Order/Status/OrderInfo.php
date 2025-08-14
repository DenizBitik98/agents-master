<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 12:07
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Order\Status;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderInfo
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Order\Status
 */
class OrderInfo {
	const DONE = 0;
	const ORDER_NOT_FOUND = 1;
	const ORDER_CANCELED = 2;
	const ORDER_NOT_CONFIRMED = 4;
	const ORDER_IN_PROCESS = 10;
	const ORDER_BLOCKED = 11;
	/**
	 * @JMS\SerializedName("OrderId")
	 * @JMS\Type("string")
	 * @var null|string $OrderId
	 */
	protected $OrderId;
	/**
	 * @JMS\SerializedName("Status")
	 * @JMS\Type("string")
	 * @var null|int $Status
	 */
	protected $Status;
	/**
	 * @JMS\SerializedName("TerminalName")
	 * @JMS\Type("string")
	 * @var null|string $TerminalName
	 */
	protected $TerminalName;
	/**
	 * @JMS\SerializedName("DepartureTrainNumber")
	 * @JMS\Type("string")
	 * @var null|string $DepartureTrainNumber
	 */
	protected $DepartureTrainNumber;
	/**
	 * @JMS\SerializedName("DepartureStation")
	 * @JMS\Type("string")
	 * @var null|string $DepartureStation
	 */
	protected $DepartureStation;
	/**
	 * @JMS\SerializedName("DepartureDateTime")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $DepartureDateTime
	 */
	protected $DepartureDateTime;
	/**
	 * @JMS\SerializedName("ArrivalTrainNumber")
	 * @JMS\Type("string")
	 * @var null|string $ArrivalTrainNumber
	 */
	protected $ArrivalTrainNumber;
	/**
	 * @JMS\SerializedName("ArrivalStation")
	 * @JMS\Type("string")
	 * @var null|string $ArrivalStation
	 */
	protected $ArrivalStation;
	/**
	 * @JMS\SerializedName("ArrivalDateTime")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $ArrivalDateTime
	 */
	protected $ArrivalDateTime;
	/**
	 * @JMS\SerializedName("CarNumber")
	 * @JMS\Type("int")
	 * @var null|int $CarNumber
	 */
	protected $CarNumber;
	/**
	 * @JMS\SerializedName("CarType")
	 * @JMS\Type("int")
	 * @var null|int $CarType
	 */
	protected $CarType;
	/**
	 * @JMS\SerializedName("CarClassService")
	 * @JMS\Type("string")
	 * @var null|string $CarClassService
	 */
	protected $CarClassService;
	/**
	 * @JMS\SerializedName("CarAddSigns")
	 * @JMS\Type("string")
	 * @var null|string $CarAddSigns
	 */
	protected $CarAddSigns;
	/**
	 * @JMS\SerializedName("CarrierName")
	 * @JMS\Type("string")
	 * @var null|string $CarrierName
	 */
	protected $CarrierName;
	/**
	 * @JMS\SerializedName("ExpressId")
	 * @JMS\Type("string")
	 * @var null|string $ExpressId
	 */
	protected $ExpressId;
	/**
	 * @JMS\SerializedName("OrderCreateDate")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $OrderCreateDate
	 */
	protected $OrderCreateDate;

	/**
	 * @return null|string
	 */
	public function getOrderId(): ?string {
		return $this->OrderId;
	}

	/**
	 * @param null|string $OrderId
	 *
	 * @return OrderInfo
	 */
	public function setOrderId( ?string $OrderId ): OrderInfo {
		$this->OrderId = $OrderId;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getStatus(): ?int {
		return $this->Status;
	}

	/**
	 * @param int|null $Status
	 *
	 * @return OrderInfo
	 */
	public function setStatus( ?int $Status ): OrderInfo {
		$this->Status = $Status;

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
	 * @return OrderInfo
	 */
	public function setTerminalName( ?string $TerminalName ): OrderInfo {
		$this->TerminalName = $TerminalName;

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
	 * @return OrderInfo
	 */
	public function setDepartureTrainNumber( ?string $DepartureTrainNumber ): OrderInfo {
		$this->DepartureTrainNumber = $DepartureTrainNumber;

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
	 * @return OrderInfo
	 */
	public function setDepartureStation( ?string $DepartureStation ): OrderInfo {
		$this->DepartureStation = $DepartureStation;

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
	 * @return OrderInfo
	 */
	public function setDepartureDateTime( ?DateTime $DepartureDateTime ): OrderInfo {
		$this->DepartureDateTime = $DepartureDateTime;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getArrivalTrainNumber(): ?string {
		return $this->ArrivalTrainNumber;
	}

	/**
	 * @param string|null $ArrivalTrainNumber
	 *
	 * @return OrderInfo
	 */
	public function setArrivalTrainNumber( ?string $ArrivalTrainNumber ): OrderInfo {
		$this->ArrivalTrainNumber = $ArrivalTrainNumber;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getArrivalStation(): ?string {
		return $this->ArrivalStation;
	}

	/**
	 * @param string|null $ArrivalStation
	 *
	 * @return OrderInfo
	 */
	public function setArrivalStation( ?string $ArrivalStation ): OrderInfo {
		$this->ArrivalStation = $ArrivalStation;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getArrivalDateTime(): ?DateTime {
		return $this->ArrivalDateTime;
	}

	/**
	 * @param DateTime|null $ArrivalDateTime
	 *
	 * @return OrderInfo
	 */
	public function setArrivalDateTime( ?DateTime $ArrivalDateTime ): OrderInfo {
		$this->ArrivalDateTime = $ArrivalDateTime;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getCarNumber(): ?int {
		return $this->CarNumber;
	}

	/**
	 * @param int|null $CarNumber
	 *
	 * @return OrderInfo
	 */
	public function setCarNumber( ?int $CarNumber ): OrderInfo {
		$this->CarNumber = $CarNumber;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getCarType(): ?int {
		return $this->CarType;
	}

	/**
	 * @param int|null $CarType
	 *
	 * @return OrderInfo
	 */
	public function setCarType( ?int $CarType ): OrderInfo {
		$this->CarType = $CarType;

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
	 * @return OrderInfo
	 */
	public function setCarClassService( ?string $CarClassService ): OrderInfo {
		$this->CarClassService = $CarClassService;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarAddSigns(): ?string {
		return $this->CarAddSigns;
	}

	/**
	 * @param null|string $CarAddSigns
	 *
	 * @return OrderInfo
	 */
	public function setCarAddSigns( ?string $CarAddSigns ): OrderInfo {
		$this->CarAddSigns = $CarAddSigns;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCarrierName(): ?string {
		return $this->CarrierName;
	}

	/**
	 * @param null|string $CarrierName
	 *
	 * @return OrderInfo
	 */
	public function setCarrierName( ?string $CarrierName ): OrderInfo {
		$this->CarrierName = $CarrierName;

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
	 * @return OrderInfo
	 */
	public function setExpressId( ?string $ExpressId ): OrderInfo {
		$this->ExpressId = $ExpressId;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getOrderCreateDate(): ?DateTime {
		return $this->OrderCreateDate;
	}

	/**
	 * @param DateTime|null $OrderCreateDate
	 *
	 * @return OrderInfo
	 */
	public function setOrderCreateDate( ?DateTime $OrderCreateDate ): OrderInfo {
		$this->OrderCreateDate = $OrderCreateDate;

		return $this;
	}
}
