<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:08
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Blank
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Blank {
	/**
	 * @JMS\SerializedName("ReturnDate")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $ReturnDate
	 */
	protected $ReturnDate;
	/**
	 * @JMS\SerializedName("Passengers")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\Passenger>")
	 * @var null|Passenger[]|Collection $Passengers
	 */
	protected $Passengers;
	/**
	 * @JMS\SerializedName("SeatsCount")
	 * @JMS\Type("int")
	 * @var null|int $SeatsCount
	 */
	protected $SeatsCount;
	/**
	 * @JMS\SerializedName("TariffType")
	 * @JMS\Type("int")
	 * @var null|int $TariffType
	 */
	protected $TariffType;
    /**
     * @JMS\SerializedName("AdditionalPreference")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\AdditionalPreference")
     * @var null|AdditionalPreference $AdditionalPreference
     */
    protected $AdditionalPreference;

	/**
	 * Blank constructor.
	 */
	public function __construct() {
		$this->Passengers = new ArrayCollection();
	}

	/**
	 * @return DateTime|null
	 */
	public function getReturnDate(): ?DateTime {
		return $this->ReturnDate;
	}

	/**
	 * @param DateTime|null $ReturnDate
	 *
	 * @return Blank
	 */
	public function setReturnDate( ?DateTime $ReturnDate ): Blank {
		$this->ReturnDate = $ReturnDate;

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
	 * @return Blank
	 */
	public function setPassengers( $Passengers ) {
		$this->Passengers = $Passengers;

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
	 * @return Blank
	 */
	public function setSeatsCount( ?int $SeatsCount ): Blank {
		$this->SeatsCount = $SeatsCount;

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
	 * @return Blank
	 */
	public function setTariffType( ?int $TariffType ): Blank {
		$this->TariffType = $TariffType;

		return $this;
	}

    /**
     * @return AdditionalPreference|null
     */
    public function getAdditionalPreference(): ?AdditionalPreference
    {
        return $this->AdditionalPreference;
    }

    /**
     * @param AdditionalPreference|null $AdditionalPreference
     * @return Blank
     */
    public function setAdditionalPreference(?AdditionalPreference $AdditionalPreference): Blank
    {
        $this->AdditionalPreference = $AdditionalPreference;

        return $this;
    }
}
