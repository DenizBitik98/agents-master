<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:47
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Direction as BaseClass;

/**
 * Class Direction
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class Direction extends BaseClass {
	const TYPE_FORWARD = 0;
	const TYPE_BACKWARD = 1;
	/**
	 * @JMS\SerializedName("Type")
	 * @JMS\Type("int")
	 * @var null|int $type
	 */
	protected $type;
	/**
	 * @JMS\SerializedName("DepDate")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\DepDate")
	 * @var null|DepDate $DepDate
	 */
	protected $DepDate;
	/**
	 * @JMS\SerializedName("DepTime")
	 * @JMS\Type("DateTime<'H:i:s'>")
	 * @var null|\DateTime $DepTime
	 */
	protected $DepTime;
	/**
	 * @JMS\SerializedName("Train")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Train")
	 * @var null|Train $Train
	 */
	protected $Train;

	/**
	 * @return int|null
	 */
	public function getType(): ?int {
		return $this->type;
	}

	/**
	 * @param int|null $type
	 *
	 * @return Direction
	 */
	public function setType( ?int $type ): Direction {
		$this->type = $type;

		return $this;
	}

	/**
	 * @return DepDate|null
	 */
	public function getDepDate(): ?DepDate {
		return $this->DepDate;
	}

	/**
	 * @param DepDate|null $DepDate
	 *
	 * @return Direction
	 */
	public function setDepDate( ?DepDate $DepDate ): Direction {
		$this->DepDate = $DepDate;

		return $this;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getDepTime(): ?\DateTime {
		return $this->DepTime;
	}

	/**
	 * @param \DateTime|null $DepTime
	 *
	 * @return Direction
	 */
	public function setDepTime( ?\DateTime $DepTime ): Direction {
		$this->DepTime = $DepTime;

		return $this;
	}

	/**
	 * @return Train|null
	 */
	public function getTrain(): ?Train {
		return $this->Train;
	}

	/**
	 * @param Train|null $Train
	 *
	 * @return Direction
	 */
	public function setTrain( ?Train $Train ): Direction {
		$this->Train = $Train;

		return $this;
	}
}
