<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 21:50
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class CarSearchRequest
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class CarSearchRequest implements IRequest {
	/**
	 * @JMS\SerializedName("ShowWithoutPlaces")
	 * @JMS\Type("boolean")
	 * @var null|boolean $ShowWithoutPlaces
	 */
	protected $ShowWithoutPlaces;
	/**
	 * @JMS\SerializedName("DetailNumPlaces")
	 * @JMS\Type("boolean")
	 * @var null|bool $DetailNumPlaces
	 */
	protected $DetailNumPlaces = true;
	/**
	 * @JMS\SerializedName("DetailTypePlaces")
	 * @JMS\Type("boolean")
	 * @var null|bool $DetailTypePlaces
	 */
	protected $DetailTypePlaces = true;
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
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Direction")
	 * @var null|Direction $ForwardDirection
	 */
	protected $ForwardDirection;
	/**
	 * @JMS\SerializedName("BackwardDirection")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Direction")
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
	 * @return CarSearchRequest
	 */
	public function setShowWithoutPlaces( ?bool $ShowWithoutPlaces ): CarSearchRequest {
		$this->ShowWithoutPlaces = $ShowWithoutPlaces;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getDetailNumPlaces(): ?bool {
		return $this->DetailNumPlaces;
	}

	/**
	 * @param bool|null $DetailNumPlaces
	 *
	 * @return CarSearchRequest
	 */
	public function setDetailNumPlaces( ?bool $DetailNumPlaces ): CarSearchRequest {
		$this->DetailNumPlaces = $DetailNumPlaces;

		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getDetailTypePlaces(): ?bool {
		return $this->DetailTypePlaces;
	}

	/**
	 * @param bool|null $DetailTypePlaces
	 *
	 * @return CarSearchRequest
	 */
	public function setDetailTypePlaces( ?bool $DetailTypePlaces ): CarSearchRequest {
		$this->DetailTypePlaces = $DetailTypePlaces;

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
	 * @return CarSearchRequest
	 */
	public function setStationFrom( ?string $StationFrom ): CarSearchRequest {
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
	 * @return CarSearchRequest
	 */
	public function setStationTo( ?string $StationTo ): CarSearchRequest {
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
	 * @return CarSearchRequest
	 */
	public function setForwardDirection( ?Direction $ForwardDirection ): CarSearchRequest {
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
	 * @return CarSearchRequest
	 */
	public function setBackwardDirection( ?Direction $BackwardDirection ): CarSearchRequest {
		$this->BackwardDirection = $BackwardDirection;

		return $this;
	}
}
