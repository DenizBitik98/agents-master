<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:07
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Car
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Car {
	/**
	 * @JMS\SerializedName("Type")
	 * @JMS\Type("string")
	 * @var null|string $Type
	 */
	protected $Type;
	/**
	 * @JMS\SerializedName("Number")
	 * @JMS\Type("string")
	 * @var null|string $Number
	 */
	protected $Number;
	/**
	 * @JMS\SerializedName("ClassService")
	 * @JMS\Type("string")
	 * @var null|string $ClassService
	 */
	protected $ClassService;
	/**
	 * @JMS\SerializedName("AddSigns")
	 * @JMS\Type("string")
	 * @var null|string $AddSigns
	 */
	protected $AddSigns;
	/**
	 * @JMS\SerializedName("CarrierName")
	 * @JMS\Type("string")
	 * @var null|string $CarrierName
	 */
	protected $CarrierName;
	/**
	 * @JMS\SerializedName("OwnerType")
	 * @JMS\Type("string")
	 * @var null|string $OwnerType
	 */
	protected $OwnerType;

	/**
	 * Car constructor.
	 *
	 * @param string|null $Type
	 * @param string|null $Number
	 * @param null|string $ClassService
	 */
	public function __construct( ?string $Type = null, ?string $Number = null, ?string $ClassService = null ) {
		$this->setType( $Type );
		$this->setNumber( $Number );
		$this->setClassService( $ClassService );
	}

	/**
	 * @return null|string
	 */
	public function getType(): ?string {
		return $this->Type;
	}

	/**
	 * @param null|string $Type
	 *
	 * @return Car
	 */
	public function setType( ?string $Type ): Car {
		$this->Type = $Type;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getNumber(): ?string {
		return $this->Number;
	}

	/**
	 * @param null|string $Number
	 *
	 * @return Car
	 */
	public function setNumber( ?string $Number ): Car {
		$this->Number = $Number;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getClassService(): ?string {
		return $this->ClassService;
	}

	/**
	 * @param null|string $ClassService
	 *
	 * @return Car
	 */
	public function setClassService( ?string $ClassService ): Car {
		$this->ClassService = $ClassService;

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
	 * @return Car
	 */
	public function setAddSigns( ?string $AddSigns ): Car {
		$this->AddSigns = $AddSigns;

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
	 * @return Car
	 */
	public function setCarrierName( ?string $CarrierName ): Car {
		$this->CarrierName = $CarrierName;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getOwnerType(): ?string {
		return $this->OwnerType;
	}

	/**
	 * @param null|string $OwnerType
	 *
	 * @return Car
	 */
	public function setOwnerType( ?string $OwnerType ): Car {
		$this->OwnerType = $OwnerType;

		return $this;
	}
}
