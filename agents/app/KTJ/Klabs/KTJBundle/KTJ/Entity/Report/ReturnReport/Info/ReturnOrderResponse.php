<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:19
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info;

use AppBundle\Services\TimeSpan\TimeSpan;
use DateInterval;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Exception;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class ReturnOrderResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info
 */
class ReturnOrderResponse implements IResponse {
	/**
	 * @JMS\SerializedName("OrderReturnInfo")
	 * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\OrderReturnInfo")
	 * @var null|OrderReturnInfo $OrderReturnInfo
	 */
	protected $OrderReturnInfo;
	/**
	 * @JMS\SerializedName("PaymentType")
	 * @JMS\Type("int")
	 * @var null|int $PaymentType
	 */
	protected $PaymentType;
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
	 * @JMS\SerializedName("Info")
	 * @JMS\Type("string")
	 * @var null|string $Info
	 */
	protected $Info;
	/**
	 * @JMS\SerializedName("TimeBeforeDep")
	 * @JMS\Type("string")
	 * @var null|string $TimeBeforeDep
	 */
	protected $TimeBeforeDep;
	/**
	 * @JMS\SerializedName("OperationTimeStamp")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $OperationTimeStamp
	 */
	protected $OperationTimeStamp;
	/**
	 * @JMS\SerializedName("Tickets")
	 * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\Ticket>")
	 * @var null|Ticket[]|Collection $Tickets
	 */
	protected $Tickets;

	/**
	 * @return OrderReturnInfo|null
	 */
	public function getOrderReturnInfo(): ?OrderReturnInfo {
		return $this->OrderReturnInfo;
	}

	/**
	 * @param OrderReturnInfo|null $OrderReturnInfo
	 *
	 * @return ReturnOrderResponse
	 */
	public function setOrderReturnInfo( ?OrderReturnInfo $OrderReturnInfo ): ReturnOrderResponse {
		$this->OrderReturnInfo = $OrderReturnInfo;

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
	 * @return ReturnOrderResponse
	 */
	public function setPaymentType( ?int $PaymentType ): ReturnOrderResponse {
		$this->PaymentType = $PaymentType;

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
	 * @return ReturnOrderResponse
	 */
	public function setRetTariff( ?float $RetTariff ): ReturnOrderResponse {
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
	 * @return ReturnOrderResponse
	 */
	public function setRetTypeInfo( ?string $RetTypeInfo ): ReturnOrderResponse {
		$this->RetTypeInfo = $RetTypeInfo;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getInfo(): ?string {
		return $this->Info;
	}

	/**
	 * @param null|string $Info
	 *
	 * @return ReturnOrderResponse
	 */
	public function setInfo( ?string $Info ): ReturnOrderResponse {
		$this->Info = $Info;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTimeBeforeDep(): ?string {
		return $this->TimeBeforeDep;
	}

	/**
	 * @param null|string $TimeBeforeDep
	 *
	 * @return ReturnOrderResponse
	 */
	public function setTimeBeforeDep( ?string $TimeBeforeDep ): ReturnOrderResponse {
		$this->TimeBeforeDep = $TimeBeforeDep;

		return $this;
	}

	/**
	 * @return DateInterval|null
	 * @throws Exception
	 */
	public function getTimeBeforeDepAsDateInterval(): ?DateInterval {
		$TimeBeforeDep         = TimeSpan::fromTimeSpan( $this->getTimeBeforeDep() )->getInterval();
		$TimeBeforeDep->invert = true;

		return $TimeBeforeDep;
	}

	/**
	 * @return DateTime|null
	 */
	public function getOperationTimeStamp(): ?DateTime {
		return $this->OperationTimeStamp;
	}

	/**
	 * @param DateTime|null $OperationTimeStamp
	 *
	 * @return ReturnOrderResponse
	 */
	public function setOperationTimeStamp( ?DateTime $OperationTimeStamp ): ReturnOrderResponse {
		$this->OperationTimeStamp = $OperationTimeStamp;

		return $this;
	}

	/**
	 * @return Collection|Ticket[]|null
	 */
	public function getTickets() {
		return $this->Tickets;
	}

	/**
	 * @param Collection|Ticket[]|null $Tickets
	 *
	 * @return ReturnOrderResponse
	 */
	public function setTickets( $Tickets ): ReturnOrderResponse {
		$this->Tickets = $Tickets;

		return $this;
	}
}
