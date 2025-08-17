<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 27.05.2018
 * Time: 23:58
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train;


use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\TrainCollection as BaseClass;

/**
 * Class TrainCollection
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Train
 */
class TrainCollection extends BaseClass {
	/**
	 * @JMS\SerializedName("TrainsCollection")
	 * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\Train>")
	 * @var null|Collection|Train[] $TrainsCollection
	 */
	protected $TrainsCollection;

	/**
	 * @return Collection|null|Train[]
	 */
	public function getTrainsCollection() {
		return $this->TrainsCollection;
	}

	/**
	 * @param Collection|null $TrainsCollection
	 *
	 * @return TrainCollection
	 */
	public function setTrainsCollection( ?Collection $TrainsCollection ): TrainCollection {
		$this->TrainsCollection = $TrainsCollection;

		return $this;
	}
}
