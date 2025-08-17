<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.08.2018
 * Time: 1:33
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Route
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Train\Route
 */
class Route {
	/**
	 * @JMS\SerializedName("Title")
	 * @JMS\Type("string")
	 * @var null|string $Title
	 */
	protected $Title;
	/**
	 * @JMS\SerializedName("Route")
	 * @JMS\Type("ArrayCollection<string>")
	 * @var null|Collection $Route
	 */
	protected $Route;
	/**
	 * @JMS\SerializedName("Stop")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Train\Route\Stop>")
	 * @var null|Collection $Stop
	 */
	protected $Stop;

	/**
	 * @return null|string
	 */
	public function getTitle(): ?string {
		return $this->Title;
	}

	/**
	 * @param null|string $Title
	 *
	 * @return Route
	 */
	public function setTitle( ?string $Title ): Route {
		$this->Title = $Title;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getRoute(): ?Collection {
		return $this->Route;
	}

	/**
	 * @param Collection|null $Route
	 *
	 * @return Route
	 */
	public function setRoute( ?Collection $Route ): Route {
		$this->Route = $Route;

		return $this;
	}

	/**
	 * @return Collection|null
	 */
	public function getStop(): ?Collection {
		return $this->Stop;
	}

	/**
	 * @param Collection|null $Stop
	 *
	 * @return Route
	 */
	public function setStop( ?Collection $Stop ): Route {
		$this->Stop = $Stop;

		return $this;
	}
}
