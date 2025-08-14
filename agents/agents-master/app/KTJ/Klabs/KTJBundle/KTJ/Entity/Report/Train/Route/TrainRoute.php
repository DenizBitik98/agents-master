<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 1:36
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TrainRoute
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Train\Route
 */
class TrainRoute {
	/**
	 * @JMS\SerializedName("Number")
	 * @JMS\Type("string")
	 * @var null|string $Number
	 */
	protected $Number;
	/**
	 * @JMS\SerializedName("Routes")
	 * @JMS\Type("ArrayCollection<string>")
	 * @var null|Collection $Routes
	 */
	protected $Routes;

	/**
	 * @return null|string
	 */
	public function getNumber(): ?string {
		return $this->Number;
	}

	/**
	 * @param null|string $Number
	 *
	 * @return TrainRoute
	 */
	public function setNumber( ?string $Number ): TrainRoute {
		$this->Number = $Number;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getRoutes(): ?Collection {
		return $this->Routes;
	}

	/**
	 * @param Collection|null $Routes
	 *
	 * @return TrainRoute
	 */
	public function setRoutes( ?Collection $Routes ): TrainRoute {
		$this->Routes = $Routes;

		return $this;
	}
}
