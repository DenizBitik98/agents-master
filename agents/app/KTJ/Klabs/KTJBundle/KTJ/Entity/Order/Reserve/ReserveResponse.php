<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 05.08.2018
 * Time: 15:38
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class ReservationReserveResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class ReserveResponse implements IResponse {
	/**
	 * @JMS\SerializedName("Order")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Order")
	 * @var null|Order $Order
	 */
	protected $Order;
	/**
	 * @JMS\SerializedName("Departure")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Station")
	 * @var null|Station $Departure
	 */
	protected $Departure;
	/**
	 * @JMS\SerializedName("Arrival")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Station")
	 * @var null|Station $Arrival
	 */
	protected $Arrival;
	/**
	 * @JMS\SerializedName("Carrier")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Carrier")
	 * @var null|Carrier $Carrier
	 */
	protected $Carrier;
	/**
	 * @JMS\SerializedName("Car")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Car")
	 * @var null|Car $Car
	 */
	protected $Car;
	/**
	 * @JMS\SerializedName("SeatsCount")
	 * @JMS\Type("int")
	 * @var null|int $SeatsCount
	 */
	protected $SeatsCount;
	/**
	 * @JMS\SerializedName("Tickets")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Ticket>")
	 * @var null|Collection|Ticket[] $Tickets
	 */
	protected $Tickets;
	/**
	 * @JMS\SerializedName("IIDB")
	 * @JMS\Type("string")
	 * @var null|string $IIDB
	 */
	protected $IIDB;
	/**
	 * @JMS\SerializedName("SignR")
	 * @JMS\Type("string")
	 * @var null|string $SignR
	 */
	protected $SignR;
	/**
	 * @JMS\SerializedName("SignGb")
	 * @JMS\Type("string")
	 * @var null|string $SignGb
	 */
	protected $SignGb;
	/**
	 * @JMS\SerializedName("TerminalName")
	 * @JMS\Type("string")
	 * @var null|string $TerminalName
	 */
	protected $TerminalName;
	/**
	 * @JMS\SerializedName("TerminalZNKKM")
	 * @JMS\Type("string")
	 * @var null|string $TerminalZNKKM
	 */
	protected $TerminalZNKKM;
	/**
	 * @JMS\SerializedName("BrunchBin")
	 * @JMS\Type("string")
	 * @var null|string $BrunchBin
	 */
	protected $BrunchBin;
	/**
	 * @JMS\SerializedName("PayerInfo")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PayerInfo")
	 * @var null|PayerInfo $PayerInfo
	 */
	protected $PayerInfo;
	/**
	 * @JMS\SerializedName("PrintedBlankInfo")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PrintedBlankInfo")
	 * @var null|PrintedBlankInfo $PrintedBlankInfo
	 */
	protected $PrintedBlankInfo;

	/**
	 * @return Order|null
	 */
	public function getOrder(): ?Order {
		return $this->Order;
	}

	/**
	 * @param Order|null $Order
	 *
	 * @return ReserveResponse
	 */
	public function setOrder( ?Order $Order ): ReserveResponse {
		$this->Order = $Order;

		return $this;
	}

	/**
	 * @return Station|null
	 */
	public function getDeparture(): ?Station {
		return $this->Departure;
	}

	/**
	 * @param Station|null $Departure
	 *
	 * @return ReserveResponse
	 */
	public function setDeparture( ?Station $Departure ): ReserveResponse {
		$this->Departure = $Departure;

		return $this;
	}

	/**
	 * @return Station|null
	 */
	public function getArrival(): ?Station {
		return $this->Arrival;
	}

	/**
	 * @param Station|null $Arrival
	 *
	 * @return ReserveResponse
	 */
	public function setArrival( ?Station $Arrival ): ReserveResponse {
		$this->Arrival = $Arrival;

		return $this;
	}

	/**
	 * @return Carrier|null
	 */
	public function getCarrier(): ?Carrier {
		return $this->Carrier;
	}

	/**
	 * @param Carrier|null $Carrier
	 *
	 * @return ReserveResponse
	 */
	public function setCarrier( ?Carrier $Carrier ): ReserveResponse {
		$this->Carrier = $Carrier;

		return $this;
	}

	/**
	 * @return Car|null
	 */
	public function getCar(): ?Car {
		return $this->Car;
	}

	/**
	 * @param Car|null $Car
	 *
	 * @return ReserveResponse
	 */
	public function setCar( ?Car $Car ): ReserveResponse {
		$this->Car = $Car;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSeatsCount(): ?int {
		return $this->SeatsCount;
	}

	/**
	 * @param int|null $SeatsCount
	 *
	 * @return ReserveResponse
	 */
	public function setSeatsCount( ?int $SeatsCount ): ReserveResponse {
		$this->SeatsCount = $SeatsCount;

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
	 * @return ReserveResponse
	 */
	public function setTickets( $Tickets ) {
		$this->Tickets = $Tickets;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getIIDB(): ?string {
		return $this->IIDB;
	}

	/**
	 * @param null|string $IIDB
	 *
	 * @return ReserveResponse
	 */
	public function setIIDB( ?string $IIDB ): ReserveResponse {
		$this->IIDB = $IIDB;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getSignR(): ?string {
		return $this->SignR;
	}

	/**
	 * @param null|string $SignR
	 *
	 * @return ReserveResponse
	 */
	public function setSignR( ?string $SignR ): ReserveResponse {
		$this->SignR = $SignR;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getSignGb(): ?string {
		return $this->SignGb;
	}

	/**
	 * @param null|string $SignGb
	 *
	 * @return ReserveResponse
	 */
	public function setSignGb( ?string $SignGb ): ReserveResponse {
		$this->SignGb = $SignGb;

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
	 * @return ReserveResponse
	 */
	public function setTerminalName( ?string $TerminalName ): ReserveResponse {
		$this->TerminalName = $TerminalName;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTerminalZNKKM(): ?string {
		return $this->TerminalZNKKM;
	}

	/**
	 * @param null|string $TerminalZNKKM
	 *
	 * @return ReserveResponse
	 */
	public function setTerminalZNKKM( ?string $TerminalZNKKM ): ReserveResponse {
		$this->TerminalZNKKM = $TerminalZNKKM;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getBrunchBin(): ?string {
		return $this->BrunchBin;
	}

	/**
	 * @param null|string $BrunchBin
	 *
	 * @return ReserveResponse
	 */
	public function setBrunchBin( ?string $BrunchBin ): ReserveResponse {
		$this->BrunchBin = $BrunchBin;

		return $this;
	}

	/**
	 * @return null|PayerInfo
	 */
	public function getPayerInfo(): ?PayerInfo {
		return $this->PayerInfo;
	}

	/**
	 * @param null|PayerInfo $PayerInfo
	 *
	 * @return ReserveResponse
	 */
	public function setPayerInfo( ?PayerInfo $PayerInfo ): ReserveResponse {
		$this->PayerInfo = $PayerInfo;

		return $this;
	}

	/**
	 * @return PrintedBlankInfo|null
	 */
	public function getPrintedBlankInfo(): ?PrintedBlankInfo {
		return $this->PrintedBlankInfo;
	}

	/**
	 * @param PrintedBlankInfo|null $PrintedBlankInfo
	 *
	 * @return ReserveResponse
	 */
	public function setPrintedBlankInfo( ?PrintedBlankInfo $PrintedBlankInfo ): ReserveResponse {
		$this->PrintedBlankInfo = $PrintedBlankInfo;

		return $this;
	}
}
