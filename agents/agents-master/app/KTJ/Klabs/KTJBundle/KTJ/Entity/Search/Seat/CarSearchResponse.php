<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 21:51
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class CarSearchResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Response
 */
class CarSearchResponse implements IResponse {
	/**
	 * @JMS\SerializedName("ShowWithoutPlaces")
	 * @JMS\Type("bool")
	 * @var null|bool $ShowWithoutPlaces
	 */
	protected $ShowWithoutPlaces;
	/**
	 * @JMS\SerializedName("ForwardDirectionDto")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\DirectionDto")
	 * @var null|DirectionDto $ForwardDirectionDto
	 */
	protected $ForwardDirectionDto;
	/**
	 * @JMS\SerializedName("BackwardDirectionDto")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\DirectionDto")
	 * @var null|DirectionDto $BackwardDirectionDto
	 */
	protected $BackwardDirectionDto;

	/**
	 * @return bool|null
	 */
	public function getShowWithoutPlaces(): ?bool {
		return $this->ShowWithoutPlaces;
	}

	/**
	 * @param bool|null $ShowWithoutPlaces
	 *
	 * @return CarSearchResponse
	 */
	public function setShowWithoutPlaces( ?bool $ShowWithoutPlaces ): CarSearchResponse {
		$this->ShowWithoutPlaces = $ShowWithoutPlaces;

		return $this;
	}

	/**
	 * @return DirectionDto|null
	 */
	public function getForwardDirectionDto(): ?DirectionDto {
		return $this->ForwardDirectionDto;
	}

	/**
	 * @param DirectionDto|null $ForwardDirectionDto
	 *
	 * @return CarSearchResponse
	 */
	public function setForwardDirectionDto( ?DirectionDto $ForwardDirectionDto ): CarSearchResponse {
		$this->ForwardDirectionDto = $ForwardDirectionDto;

		return $this;
	}

	/**
	 * @return DirectionDto|null
	 */
	public function getBackwardDirectionDto(): ?DirectionDto {
		return $this->BackwardDirectionDto;
	}

	/**
	 * @param DirectionDto|null $BackwardDirectionDto
	 *
	 * @return CarSearchResponse
	 */
	public function setBackwardDirectionDto( ?DirectionDto $BackwardDirectionDto ): CarSearchResponse {
		$this->BackwardDirectionDto = $BackwardDirectionDto;

		return $this;
	}
}
