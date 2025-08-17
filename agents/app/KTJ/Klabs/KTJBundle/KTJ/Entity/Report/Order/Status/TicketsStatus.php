<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 12:06
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Order\Status;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TicketsStatus
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Order\Status
 */
class TicketsStatus {
	const STATE_PAYMENT_CONFIRMED = 0;
	const STATE_PAYMENT_CONFIRMED_EL_REG = 1;
	const STATE_PAYMENT_UNCONFIRMED = 2;
	const STATE_CANCELLED = 3;
	const STATE_RETURNED = 4;
	const STATE_CLAIM_RETURNED = 5;
	const STATE_BOARDING_PASS = 6;
	const STATE_DEFERRED_PAYMENT = 7;
	/**
	 * @JMS\SerializedName("TicketId")
	 * @JMS\Type("string")
	 * @var null|string $TicketId
	 */
	protected $TicketId;
	/**
	 * @JMS\SerializedName("ExpressID")
	 * @JMS\Type("string")
	 * @var null|string $ExpressID
	 */
	protected $ExpressID;
	/**
	 * @JMS\SerializedName("State")
	 * @JMS\Type("int")
	 * @var null|int $State
	 */
	protected $State;
	/**
	 * @JMS\SerializedName("Seats")
	 * @JMS\Type("string")
	 * @var null|string $Seats
	 */
	protected $Seats;
	/**
	 * @JMS\SerializedName("Passengers")
	 * @JMS\Type("ArrayCollection<Klabs\KTJBundle\KTJ\Entity\Report\Order\Status\Passenger>")
	 * @var null|Collection $Passengers
	 */
	protected $Passengers;
	/**
	 * @JMS\SerializedName("TariffType")
	 * @JMS\Type("int")
	 * @var null|int $TariffType
	 */
	protected $TariffType;
	/**
	 * @JMS\SerializedName("Tariff")
	 * @JMS\Type("float")
	 * @var null|float $Tariff
	 */
	protected $Tariff;
	/**
	 * @JMS\SerializedName("FiscalizationRequested")
	 * @JMS\Type("bool")
	 * @var null|bool $FiscalizationRequested
	 */
	protected $FiscalizationRequested;
	/**
	 * @JMS\SerializedName("FiscalizationInfo")
	 * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Report\Order\Status\FiscalizationInfo")
	 * @var null|FiscalizationInfo $FiscalizationInfo
	 */
	protected $FiscalizationInfo;

	/**
	 * @return null|string
	 */
	public function getTicketId(): ?string {
		return $this->TicketId;
	}

	/**
	 * @param null|string $TicketId
	 *
	 * @return TicketsStatus
	 */
	public function setTicketId( ?string $TicketId ): TicketsStatus {
		$this->TicketId = $TicketId;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getExpressID(): ?string {
		return $this->ExpressID;
	}

	/**
	 * @param null|string $ExpressID
	 *
	 * @return TicketsStatus
	 */
	public function setExpressID( ?string $ExpressID ): TicketsStatus {
		$this->ExpressID = $ExpressID;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getState(): ?int {
		return $this->State;
	}

	/**
	 * @param int|null $State
	 *
	 * @return TicketsStatus
	 */
	public function setState( ?int $State ): TicketsStatus {
		$this->State = $State;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getSeats(): ?string {
		return $this->Seats;
	}

	/**
	 * @param null|string $Seats
	 *
	 * @return TicketsStatus
	 */
	public function setSeats( ?string $Seats ): TicketsStatus {
		$this->Seats = $Seats;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getPassengers(): ?Collection {
		return $this->Passengers;
	}

	/**
	 * @param Collection|null $Passengers
	 *
	 * @return TicketsStatus
	 */
	public function setPassengers( ?Collection $Passengers ): TicketsStatus {
		$this->Passengers = $Passengers;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getTariffType(): ?int {
		return $this->TariffType;
	}

	/**
	 * @param int|null $TariffType
	 *
	 * @return TicketsStatus
	 */
	public function setTariffType( ?int $TariffType ): TicketsStatus {
		$this->TariffType = $TariffType;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getTariff(): ?float {
		return $this->Tariff;
	}

	/**
	 * @param float|null $Tariff
	 *
	 * @return TicketsStatus
	 */
	public function setTariff( ?float $Tariff ): TicketsStatus {
		$this->Tariff = $Tariff;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getFiscalizationRequested(): ?bool {
		return $this->FiscalizationRequested;
	}

	/**
	 * @param bool|null $FiscalizationRequested
	 *
	 * @return TicketsStatus
	 */
	public function setFiscalizationRequested( ?bool $FiscalizationRequested ): TicketsStatus {
		$this->FiscalizationRequested = $FiscalizationRequested;

		return $this;
	}

	/**
	 * @return FiscalizationInfo|null
	 */
	public function getFiscalizationInfo(): ?FiscalizationInfo {
		return $this->FiscalizationInfo;
	}

	/**
	 * @param FiscalizationInfo|null $FiscalizationInfo
	 *
	 * @return TicketsStatus
	 */
	public function setFiscalizationInfo( ?FiscalizationInfo $FiscalizationInfo ): TicketsStatus {
		$this->FiscalizationInfo = $FiscalizationInfo;

		return $this;
	}
}
