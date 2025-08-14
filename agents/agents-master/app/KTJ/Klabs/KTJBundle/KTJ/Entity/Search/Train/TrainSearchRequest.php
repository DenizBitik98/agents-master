<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 24.05.2018
 * Time: 12:41
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class TrainSearchRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Train
 */
class TrainSearchRequest implements IRequest {
	/**
	 * @JMS\SerializedName("ShowWithoutPlaces")
	 * @JMS\Type("boolean")
	 * @var null|boolean $ShowWithoutPlaces
	 */
	protected $ShowWithoutPlaces;
	/**
	 * @JMS\SerializedName("StationFrom")
	 * @JMS\Type("string")
	 * @var null|string $StationFrom
	 */
	protected $StationFrom;
	/**
	 * @JMS\SerializedName("StationTo")
	 * @JMS\Type("string")
	 * @var null|string $StationTo
	 */
	protected $StationTo;
	/**
	 * @JMS\SerializedName("ForwardDirection")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\Direction")
	 * @var null|Direction $ForwardDirection
	 */
	protected $ForwardDirection;
	/**
	 * @JMS\SerializedName("BackwardDirection")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\Direction")
	 * @var null|Direction $BackwardDirection
	 */
	protected $BackwardDirection;

	/**
	 * @return bool|null
	 */
	public function getShowWithoutPlaces(): ?bool {
		return $this->ShowWithoutPlaces;
	}

	/**
	 * @param bool|null $ShowWithoutPlaces
	 *
	 * @return TrainSearchRequest
	 */
	public function setShowWithoutPlaces( ?bool $ShowWithoutPlaces ): TrainSearchRequest {
		$this->ShowWithoutPlaces = $ShowWithoutPlaces;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStationFrom(): ?string {
		return $this->StationFrom;
	}

	/**
	 * @param null|string $StationFrom
	 *
	 * @return TrainSearchRequest
	 */
	public function setStationFrom( ?string $StationFrom ): TrainSearchRequest {
		$this->StationFrom = $StationFrom;

		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getStationTo(): ?string {
		return $this->StationTo;
	}

	/**
	 * @param null|string $StationTo
	 *
	 * @return TrainSearchRequest
	 */
	public function setStationTo( ?string $StationTo ): TrainSearchRequest {
		$this->StationTo = $StationTo;

		return $this;
	}

	/**
	 * @return Direction|null
	 */
	public function getForwardDirection(): ?Direction {
		return $this->ForwardDirection;
	}

	/**
	 * @param Direction|null $ForwardDirection
	 *
	 * @return TrainSearchRequest
	 */
	public function setForwardDirection( ?Direction $ForwardDirection ): TrainSearchRequest {
		$this->ForwardDirection = $ForwardDirection;

		return $this;
	}

	/**
	 * @return Direction|null
	 */
	public function getBackwardDirection(): ?Direction {
		return $this->BackwardDirection;
	}

	/**
	 * @param Direction|null $BackwardDirection
	 *
	 * @return TrainSearchRequest
	 */
	public function setBackwardDirection( ?Direction $BackwardDirection ): TrainSearchRequest {
		$this->BackwardDirection = $BackwardDirection;

		return $this;
	}
}
