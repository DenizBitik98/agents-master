<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 25.05.2018
 * Time: 18:45
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class TrainSearchResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Train
 */
class TrainSearchResponse implements IResponse {
	/**
	 * @JMS\SerializedName("ShowWithoutPlaces")
	 * @JMS\Type("boolean")
	 * @var null|bool $ShowWithoutPlaces
	 */
	protected $ShowWithoutPlaces;
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
	 * @return TrainSearchResponse
	 */
	public function setShowWithoutPlaces( ?bool $ShowWithoutPlaces ): TrainSearchResponse {
		$this->ShowWithoutPlaces = $ShowWithoutPlaces;

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
	 * @return TrainSearchResponse
	 */
	public function setForwardDirection( ?Direction $ForwardDirection ): TrainSearchResponse {
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
	 * @return TrainSearchResponse
	 */
	public function setBackwardDirection( ?Direction $BackwardDirection ): TrainSearchResponse {
		$this->BackwardDirection = $BackwardDirection;

		return $this;
	}
}
