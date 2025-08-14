<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:58
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat;

use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\TrainCollection as BaseClass;

/**
 * Class TrainCollection
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Seat
 */
class TrainCollection extends BaseClass {
	/**
	 * @JMS\SerializedName("Train")
	 * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Train")
	 * @var null|Train $Train
	 */
	protected $Train;

	/**
	 * @return Train|null
	 */
	public function getTrain(): ?Train {
		return $this->Train;
	}

	/**
	 * @param Train|null $Train
	 *
	 * @return TrainCollection
	 */
	public function setTrain( ?Train $Train ): TrainCollection {
		$this->Train = $Train;

		return $this;
	}
}
