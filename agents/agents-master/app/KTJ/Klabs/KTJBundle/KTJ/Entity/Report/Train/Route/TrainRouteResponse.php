<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 0:09
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class TrainRouteResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Train\Route
 */
class TrainRouteResponse implements IResponse {
	/**
	 * @JMS\SerializedName("TrainRoute")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route\TrainRoute")
	 * @var null|TrainRoute $TrainRoute
	 */
	protected $TrainRoute;
	/**
	 * @JMS\SerializedName("Routes")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route\Route>")
	 * @var null|Collection $Routes
	 */
	protected $Routes;

	/**
	 * @return TrainRoute|null
	 */
	public function getTrainRoute(): ?TrainRoute {
		return $this->TrainRoute;
	}

	/**
	 * @param TrainRoute|null $TrainRoute
	 *
	 * @return TrainRouteResponse
	 */
	public function setTrainRoute( ?TrainRoute $TrainRoute ): TrainRouteResponse {
		$this->TrainRoute = $TrainRoute;

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
	 * @return TrainRouteResponse
	 */
	public function setRoutes( ?Collection $Routes ): TrainRouteResponse {
		$this->Routes = $Routes;

		return $this;
	}
}
