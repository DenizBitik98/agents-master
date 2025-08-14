<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:26
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;


use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class DirectionDto
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class DirectionDto {
	/**
	 * @JMS\SerializedName("Type")
	 * @JMS\Type("integer")
	 * @var null|int $Type
	 */
	protected $Type;
	/**
	 * @JMS\SerializedName("PassRoute")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\PassRoute")
	 * @var null|PassRoute $PassRoute
	 */
	protected $PassRoute;
	/**
	 * @JMS\SerializedName("Trains")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\TrainCollection>")
	 * @var null|Collection|TrainCollection[] $Trains
	 */
	protected $Trains;

	/**
	 * @return int|null
	 */
	public function getType(): ?int {
		return $this->Type;
	}

	/**
	 * @param int|null $Type
	 *
	 * @return DirectionDto
	 */
	public function setType( ?int $Type ): DirectionDto {
		$this->Type = $Type;

		return $this;
	}

	/**
	 * @return PassRoute|null
	 */
	public function getPassRoute(): ?PassRoute {
		return $this->PassRoute;
	}

	/**
	 * @param PassRoute|null $PassRoute
	 *
	 * @return DirectionDto
	 */
	public function setPassRoute( ?PassRoute $PassRoute ): DirectionDto {
		$this->PassRoute = $PassRoute;

		return $this;
	}

	/**
	 * @return Collection|TrainCollection[]|null
	 */
	public function getTrains() {
		return $this->Trains;
	}

	/**
	 * @param Collection|TrainCollection[]|null $Trains
	 *
	 * @return DirectionDto
	 */
	public function setTrains( ?Collection $Trains ): DirectionDto {
		$this->Trains = $Trains;

		return $this;
	}
}
