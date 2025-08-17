<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.05.2018
 * Time: 0:04
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as JMS;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Direction as BaseClass;

/**
 * Class Direction
 * @package Klabs\KTJBundle\KTJ\Entity\Search\Train
 */
class Direction extends BaseClass
{
    /**
     * @JMS\SerializedName("Trains")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\TrainCollection>")
     * @var null|Collection|TrainCollection[] $Trains
     */
    protected $Trains;

    /**
     * @return TrainCollection[]|Collection|null
     */
    public function getTrains()
    {
        return $this->Trains;
    }

    /**
     * @param Collection|TrainCollection[]|null $Trains
     *
     * @return Direction
     */
    public function setTrains($Trains)
    {
        $this->Trains = $Trains;

        return $this;
    }
}
