<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 1:30
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Stop
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Train\Route
 */
class Stop {
	/**
	 * @JMS\SerializedName("Title")
	 * @JMS\Type("string")
	 * @var null|string $Title
	 */
	protected $Title;
	/**
	 * @JMS\SerializedName("Station")
	 * @JMS\Type("string")
	 * @var null|string $Station
	 */
	protected $Station;
	/**
	 * @JMS\SerializedName("Code")
	 * @JMS\Type("string")
	 * @var null|string $Code
	 */
	protected $Code;
	/**
	 * @JMS\SerializedName("ArvTime")
	 * @JMS\Type("string")
	 * @var null|string $ArvTime
	 */
	protected $ArvTime;
	/**
	 * @JMS\SerializedName("WaitingTime")
	 * @JMS\Type("string")
	 * @var null|string $WaitingTime
	 */
	protected $WaitingTime;
	/**
	 * @JMS\SerializedName("DepTime")
	 * @JMS\Type("string")
	 * @var null|string $DepTime
	 */
	protected $DepTime;
	/**
	 * @JMS\SerializedName("Sign")
	 * @JMS\Type("string")
	 * @var null|string $Sign
	 */
	protected $Sign;
	/**
	 * @JMS\SerializedName("Days")
	 * @JMS\Type("int")
	 * @var null|int $Days
	 */
	protected $Days;
	/**
	 * @JMS\SerializedName("Distance")
	 * @JMS\Type("int")
	 * @var null|int $Distance
	 */
	protected $Distance;

	/**
	 * @return null|string
	 */
	public function getTitle(): ?string {
		return $this->Title;
	}

	/**
	 * @param null|string $Title
	 *
	 * @return Stop
	 */
	public function setTitle( ?string $Title ): Stop {
		$this->Title = $Title;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStation(): ?string {
		return $this->Station;
	}

	/**
	 * @param null|string $Station
	 *
	 * @return Stop
	 */
	public function setStation( ?string $Station ): Stop {
		$this->Station = $Station;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getCode(): ?string {
		return $this->Code;
	}

	/**
	 * @param null|string $Code
	 *
	 * @return Stop
	 */
	public function setCode( ?string $Code ): Stop {
		$this->Code = $Code;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getArvTime(): ?string {
		return $this->ArvTime;
	}

	/**
	 * @param string|null $ArvTime
	 *
	 * @return Stop
	 */
	public function setArvTime( ?string $ArvTime ): Stop {
		$this->ArvTime = $ArvTime;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getWaitingTime(): ?string {
		return $this->WaitingTime;
	}

	/**
	 * @param string|null $WaitingTime
	 *
	 * @return Stop
	 */
	public function setWaitingTime( ?string $WaitingTime ): Stop {
		$this->WaitingTime = $WaitingTime;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDepTime(): ?string {
		return $this->DepTime;
	}

	/**
	 * @param string|null $DepTime
	 *
	 * @return Stop
	 */
	public function setDepTime( ?string $DepTime ): Stop {
		$this->DepTime = $DepTime;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getSign(): ?string {
		return $this->Sign;
	}

	/**
	 * @param null|string $Sign
	 *
	 * @return Stop
	 */
	public function setSign( ?string $Sign ): Stop {
		$this->Sign = $Sign;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getDays(): ?int {
		return $this->Days;
	}

	/**
	 * @param int|null $Days
	 *
	 * @return Stop
	 */
	public function setDays( ?int $Days ): Stop {
		$this->Days = $Days;

		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getDistance(): ?int {
		return $this->Distance;
	}

	/**
	 * @param int|null $Distance
	 *
	 * @return Stop
	 */
	public function setDistance( ?int $Distance ): Stop {
		$this->Distance = $Distance;

		return $this;
	}
}
