<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.09.2018
 * Time: 12:38
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Ticket
 * @package Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info
 */
class Ticket {
	/**
	 * @JMS\SerializedName("Number")
	 * @JMS\Type("string")
	 * @var null|string $Number
	 */
	protected $Number;
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
	 * @JMS\SerializedName("TariffInsurance")
	 * @JMS\Type("float")
	 * @var null|float $TariffInsurance
	 */
	protected $TariffInsurance;

	/**
	 * @return null|string
	 */
	public function getNumber(): ?string {
		return $this->Number;
	}

	/**
	 * @param null|string $Number
	 *
	 * @return Ticket
	 */
	public function setNumber( ?string $Number ): Ticket {
		$this->Number = $Number;

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
	public function getTariffInsurance(): ?float {
		return $this->TariffInsurance;
	}

	/**
	 * @param float|null $TariffInsurance
	 *
	 * @return Ticket
	 */
	public function setTariffInsurance( ?float $TariffInsurance ): Ticket {
		$this->TariffInsurance = $TariffInsurance;

		return $this;
	}
}
