<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:42
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Name
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class PassengerName {
	/**
	 * @JMS\SerializedName("FirstName")
	 * @JMS\Type("string")
	 * @var null|string $FirstName
	 */
	protected $FirstName;
	/**
	 * @JMS\SerializedName("LastName")
	 * @JMS\Type("string")
	 * @var null|string $LastName
	 */
	protected $LastName;
	/**
	 * @JMS\SerializedName("Patronymic")
	 * @JMS\Type("string")
	 * @var null|string $Patronymic
	 */
	protected $Patronymic;

	/**
	 * PassengerName constructor.
	 *
	 * @param null|string $FirstName
	 * @param null|string $LastName
	 * @param null|string $Patronymic
	 */
	public function __construct( ?string $FirstName = null, ?string $LastName = null, ?string $Patronymic = null ) {
		$this->setFirstName( $FirstName );
		$this->setLastName( $LastName );
		$this->setPatronymic( $Patronymic );
	}

	/**
	 * @return null|string
	 */
	public function getFirstName(): ?string {
		return $this->FirstName;
	}

	/**
	 * @param null|string $FirstName
	 *
	 * @return PassengerName
	 */
	public function setFirstName( ?string $FirstName ): PassengerName {
		$this->FirstName = $FirstName;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getLastName(): ?string {
		return $this->LastName;
	}

	/**
	 * @param null|string $LastName
	 *
	 * @return PassengerName
	 */
	public function setLastName( ?string $LastName ): PassengerName {
		$this->LastName = $LastName;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPatronymic(): ?string {
		return $this->Patronymic;
	}

	/**
	 * @param null|string $Patronymic
	 *
	 * @return PassengerName
	 */
	public function setPatronymic( ?string $Patronymic ): PassengerName {
		$this->Patronymic = $Patronymic;

		return $this;
	}
}
