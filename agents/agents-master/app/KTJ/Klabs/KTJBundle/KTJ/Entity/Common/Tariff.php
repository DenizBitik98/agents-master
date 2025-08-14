<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 21:30
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Tariff
 * @package Klabs\KTJBundle\KTJ\Entity\Common
 */
class Tariff {
	/**
	 * @JMS\SerializedName("ClassService")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\ClassService")
	 * @var null|ClassService $ClassService
	 */
	protected $ClassService;
	/**
	 * @JMS\SerializedName("ClassServiceInt")
	 * @JMS\Type("int")
	 * @var null|int $ClassServiceInt
	 */
	protected $ClassServiceInt;
	/**
	 * @JMS\SerializedName("AddSigns")
	 * @JMS\Type("string")
	 * @var null|string $AddSigns
	 */
	protected $AddSigns;
	/**
	 * @JMS\SerializedName("TariffValue")
	 * @JMS\Type("float")
	 * @var null|float $TariffValue
	 */
	protected $TariffValue;
	/**
	 * @JMS\SerializedName("TariffValue2")
	 * @JMS\Type("float")
	 * @var null|float $TariffValue2
	 */
	protected $TariffValue2;
	/**
	 * @JMS\SerializedName("TariffService")
	 * @JMS\Type("float")
	 * @var null|float $TariffService
	 */
	protected $TariffService;
	/**
	 * @JMS\SerializedName("Carrier")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Carrier")
	 * @var null|Carrier $Carrier
	 */
	protected $Carrier;
	/**
	 * @JMS\SerializedName("Owner")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Owner")
	 * @var null|Owner $Owner
	 */
	protected $Owner;
	/**
	 * @JMS\SerializedName("SaleLimitation")
	 * @JMS\Type("int")
	 * @var null|int $SaleLimitation
	 */
	protected $SaleLimitation;
	/**
	 * @JMS\SerializedName("ElRegPossible")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\ElRegPossible")
	 * @var null|bool $ElRegPossible
	 */
	protected $ElRegPossible;
	/**
	 * @JMS\SerializedName("Seats")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Seat")
	 * @var null|Seat $Seats
	 */
	protected $Seats;
	/**
	 * @JMS\SerializedName("BoardingForm")
	 * @JMS\Type("int")
	 * @var null|int $BoardingForm
	 */
	protected $BoardingForm;

	/**
	 * @return ClassService|null
	 */
	public function getClassService(): ?ClassService {
		return $this->ClassService;
	}

	/**
	 * @param ClassService|null $ClassService
	 *
	 * @return Tariff
	 */
	public function setClassService( ?ClassService $ClassService ): Tariff {
		$this->ClassService = $ClassService;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getClassServiceInt(): ?int {
		return $this->ClassServiceInt;
	}

	/**
	 * @param int|null $ClassServiceInt
	 *
	 * @return Tariff
	 */
	public function setClassServiceInt( ?int $ClassServiceInt ): Tariff {
		$this->ClassServiceInt = $ClassServiceInt;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getAddSigns(): ?string {
		return $this->AddSigns;
	}

	/**
	 * @param null|string $AddSigns
	 *
	 * @return Tariff
	 */
	public function setAddSigns( ?string $AddSigns ): Tariff {
		$this->AddSigns = $AddSigns;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getTariffValue(): ?float {
		return $this->TariffValue;
	}

	/**
	 * @param float|null $TariffValue
	 *
	 * @return Tariff
	 */
	public function setTariffValue( ?float $TariffValue ): Tariff {
		$this->TariffValue = $TariffValue;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getTariffValue2(): ?float {
		return $this->TariffValue2;
	}

	/**
	 * @param float|null $TariffValue2
	 *
	 * @return Tariff
	 */
	public function setTariffValue2( ?float $TariffValue2 ): Tariff {
		$this->TariffValue2 = $TariffValue2;

		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getTariffService(): ?float {
		return $this->TariffService;
	}

	/**
	 * @param float|null $TariffService
	 *
	 * @return Tariff
	 */
	public function setTariffService( ?float $TariffService ): Tariff {
		$this->TariffService = $TariffService;

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
	 * @return Tariff
	 */
	public function setCarrier( ?Carrier $Carrier ): Tariff {
		$this->Carrier = $Carrier;

		return $this;
	}

	/**
	 * @return Owner|null
	 */
	public function getOwner(): ?Owner {
		return $this->Owner;
	}

	/**
	 * @param Owner|null $Owner
	 *
	 * @return Tariff
	 */
	public function setOwner( ?Owner $Owner ): Tariff {
		$this->Owner = $Owner;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSaleLimitation(): ?int {
		return $this->SaleLimitation;
	}

	/**
	 * @param int|null $SaleLimitation
	 *
	 * @return Tariff
	 */
	public function setSaleLimitation( ?int $SaleLimitation ): Tariff {
		$this->SaleLimitation = $SaleLimitation;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getElRegPossible(): ?bool {
		return $this->ElRegPossible;
	}

	/**
	 * @param bool|null $ElRegPossible
	 *
	 * @return Tariff
	 */
	public function setElRegPossible( ?bool $ElRegPossible ): Tariff {
		$this->ElRegPossible = $ElRegPossible;

		return $this;
	}

	/**
	 * @return Seat|null
	 */
	public function getSeats(): ?Seat {
		return $this->Seats;
	}

	/**
	 * @param Seat|null $Seats
	 *
	 * @return Tariff
	 */
	public function setSeats( ?Seat $Seats ): Tariff {
		$this->Seats = $Seats;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getBoardingForm(): ?int {
		return $this->BoardingForm;
	}

	/**
	 * @param int|null $BoardingForm
	 *
	 * @return Tariff
	 */
	public function setBoardingForm( ?int $BoardingForm ): Tariff {
		$this->BoardingForm = $BoardingForm;

		return $this;
	}
}
