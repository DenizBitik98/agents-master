<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 12:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Ticket
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status
 */
class Ticket {
	/**
	 * @JMS\SerializedName("KRS")
	 * @JMS\Type("string")
	 * @var null|string $KRS
	 */
	protected $KRS;
	/**
	 * @JMS\SerializedName("ExpressID")
	 * @JMS\Type("string")
	 * @var null|string $ExpressID
	 */
	protected $ExpressID;
	/**
	 * @JMS\SerializedName("RetTariff")
	 * @JMS\Type("float")
	 * @var null|float $RetTariff
	 */
	protected $RetTariff;
	/**
	 * @JMS\SerializedName("RetCommissionTariff")
	 * @JMS\Type("float")
	 * @var null|float $RetCommissionTariff
	 */
	protected $RetCommissionTariff;
	/**
	 * @JMS\SerializedName("Passengers")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\Passenger>")
	 * @var null|Passenger[]|Collection $Passengers
	 */
	protected $Passengers;
	/**
	 * @JMS\SerializedName("Seats")
	 * @JMS\Type("string")
	 * @var null|string $Seats
	 */
	protected $Seats;
	/**
	 * @JMS\SerializedName("FKSNumber")
	 * @JMS\Type("string")
	 * @var null|string $FKSNumber
	 */
	protected $FKSNumber;
	/**
	 * @JMS\SerializedName("FiscalizationInfo")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\FiscalizationInfo")
	 * @var null|FiscalizationInfo $FiscalizationInfo
	 */
	protected $FiscalizationInfo;
	/**
	 * @JMS\SerializedName("TariffType")
	 * @JMS\Type("int")
	 * @var null|int $TariffType
	 */
	protected $TariffType;

	/**
	 * @return null|string
	 */
	public function getKRS(): ?string {
		return $this->KRS;
	}

	/**
	 * @param null|string $KRS
	 *
	 * @return Ticket
	 */
	public function setKRS( ?string $KRS ): Ticket {
		$this->KRS = $KRS;

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
	 * @return Ticket
	 */
	public function setExpressID( ?string $ExpressID ): Ticket {
		$this->ExpressID = $ExpressID;

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
	 * @return Ticket
	 */
	public function setRetTariff( ?float $RetTariff ): Ticket {
		$this->RetTariff = $RetTariff;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getRetCommissionTariff(): ?float {
		return $this->RetCommissionTariff;
	}

	/**
	 * @param float|null $RetCommissionTariff
	 *
	 * @return Ticket
	 */
	public function setRetCommissionTariff( ?float $RetCommissionTariff ): Ticket {
		$this->RetCommissionTariff = $RetCommissionTariff;

		return $this;
	}

	/**
	 * @return Collection|Passenger[]|null
	 */
	public function getPassengers() {
		return $this->Passengers;
	}

	/**
	 * @param Collection|Passenger[]|null $Passengers
	 *
	 * @return Ticket
	 */
	public function setPassengers( $Passengers ) {
		$this->Passengers = $Passengers;

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
	 * @return Ticket
	 */
	public function setSeats( ?string $Seats ): Ticket {
		$this->Seats = $Seats;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getFKSNumber(): ?string {
		return $this->FKSNumber;
	}

	/**
	 * @param null|string $FKSNumber
	 *
	 * @return Ticket
	 */
	public function setFKSNumber( ?string $FKSNumber ): Ticket {
		$this->FKSNumber = $FKSNumber;

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
	 * @return Ticket
	 */
	public function setFiscalizationInfo( ?FiscalizationInfo $FiscalizationInfo ): Ticket {
		$this->FiscalizationInfo = $FiscalizationInfo;

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
	 * @return Ticket
	 */
	public function setTariffType( ?int $TariffType ): Ticket {
		$this->TariffType = $TariffType;

		return $this;
	}
}
