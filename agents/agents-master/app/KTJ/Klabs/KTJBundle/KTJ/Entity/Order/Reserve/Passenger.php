<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.08.2018
 * Time: 12:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Passenger
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class Passenger {
	const SEX_M = '0';
	const SEX_W = '1';
	/**
	 * @JMS\SerializedName("TCard")
	 * @JMS\Type("string")
	 * @var null|string $TCard
	 */
	protected $TCard;
	/**
	 * @JMS\SerializedName("DocType")
	 * @JMS\Type("int")
	 * @var null|int $DocType
	 */
	protected $DocType;
	/**
	 * @JMS\SerializedName("Doc")
	 * @JMS\Type("string")
	 * @var null|string $Doc
	 */
	protected $Doc;
	/**
	 * @JMS\SerializedName("Name")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PassengerName")
	 * @var null|PassengerName $Name
	 */
	protected $Name;
	/**
	 * @JMS\SerializedName("ChildBirthday")
	 * @JMS\Type("DateTime<'Y-m-d\TH:i:s'>")
	 * @var null|DateTime $ChildBirthday
	 */
	protected $ChildBirthday;
	/**
	 * @JMS\SerializedName("WithoutPlace")
	 * @JMS\Type("bool")
	 * @var null|bool $WithoutPlace
	 */
	protected $WithoutPlace;
	/**
	 * @JMS\SerializedName("Citizenship")
	 * @JMS\Type("string")
	 * @var null|string $Citizenship
	 */
	protected $Citizenship;
	/**
	 * @JMS\SerializedName("Sex")
	 * @JMS\Type("int")
	 * @var null|int $Sex
	 */
	protected $Sex;
	/**
	 * @JMS\SerializedName("PassengerPhone")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PassengerPhone")
	 * @var null|PassengerPhone $PassengerPhone
	 */
	protected $PassengerPhone;
	/**
	 * @JMS\SerializedName("PassengerEmail")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve\PassengerEmail")
	 * @var null|PassengerEmail $PassengerEmail
	 */
	protected $PassengerEmail;
    /**
     * @JMS\SerializedName("PassengerIin")
     * @JMS\Type("string")
     * @var null|string $PassengerIin
     */
    protected $PassengerIin;

	/**
	 * @return null|string
	 */
	public function getTCard(): ?string {
		return $this->TCard;
	}

	/**
	 * @param null|string $TCard
	 *
	 * @return Passenger
	 */
	public function setTCard( ?string $TCard ): Passenger {
		$this->TCard = $TCard;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getDocType(): ?int {
		return $this->DocType;
	}

	/**
	 * @param int|null $DocType
	 *
	 * @return Passenger
	 */
	public function setDocType( ?int $DocType ): Passenger {
		$this->DocType = $DocType;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getDoc(): ?string {
		return $this->Doc;
	}

	/**
	 * @param null|string $Doc
	 *
	 * @return Passenger
	 */
	public function setDoc( ?string $Doc ): Passenger {
		$this->Doc = $Doc;

		return $this;
	}

	/**
	 * @return PassengerName|null
	 */
	public function getName(): ?PassengerName {
		return $this->Name;
	}

	/**
	 * @param PassengerName|null $Name
	 *
	 * @return Passenger
	 */
	public function setName( ?PassengerName $Name ): Passenger {
		$this->Name = $Name;

		return $this;
	}

	/**
	 * @return DateTime|null
	 */
	public function getChildBirthday(): ?DateTime {
		return $this->ChildBirthday;
	}

	/**
	 * @param DateTime|null $ChildBirthday
	 *
	 * @return Passenger
	 */
	public function setChildBirthday( ?DateTime $ChildBirthday ): Passenger {
		$this->ChildBirthday = $ChildBirthday;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getWithoutPlace(): ?bool {
		return $this->WithoutPlace;
	}

	/**
	 * @param bool|null $WithoutPlace
	 *
	 * @return Passenger
	 */
	public function setWithoutPlace( ?bool $WithoutPlace ): Passenger {
		$this->WithoutPlace = $WithoutPlace;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCitizenship(): ?string {
		return $this->Citizenship;
	}

	/**
	 * @param null|string $Citizenship
	 *
	 * @return Passenger
	 */
	public function setCitizenship( ?string $Citizenship ): Passenger {
		$this->Citizenship = $Citizenship;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSex(): ?int {
		return $this->Sex;
	}

	/**
	 * @param int|null $Sex
	 *
	 * @return Passenger
	 */
	public function setSex( ?int $Sex ): Passenger {
		$this->Sex = $Sex;

		return $this;
	}

	/**
	 * @return PassengerPhone|null
	 */
	public function getPassengerPhone(): ?PassengerPhone {
		return $this->PassengerPhone;
	}

	/**
	 * @param PassengerPhone|null $PassengerPhone
	 *
	 * @return Passenger
	 */
	public function setPassengerPhone( ?PassengerPhone $PassengerPhone ): Passenger {
		$this->PassengerPhone = $PassengerPhone;

		return $this;
	}

	/**
	 * @return PassengerEmail|null
	 */
	public function getPassengerEmail(): ?PassengerEmail {
		return $this->PassengerEmail;
	}

	/**
	 * @param PassengerEmail|null $PassengerEmail
	 *
	 * @return Passenger
	 */
	public function setPassengerEmail( ?PassengerEmail $PassengerEmail ): Passenger {
		$this->PassengerEmail = $PassengerEmail;

		return $this;
	}

    /**
     * @return string|null
     */
    public function getPassengerIin(): ?string
    {
        return $this->PassengerIin;
    }

    /**
     * @param string|null $PassengerIin
     */
    public function setPassengerIin(?string $PassengerIin): void
    {
        $this->PassengerIin = $PassengerIin;
    }
}
