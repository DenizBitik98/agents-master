<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.05.2018
 * Time: 15:23
 */

namespace App\Services\KTJ\CarriageGenerator\Builder\Traits;

use Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car;
use Tightenco\Collect\Support\Collection;

/**
 * Trait CarTrait
 * @package App\Services\KTJ\CarriageGenerator\Builder\Traits
 */
trait CarAwareTrait
{
    /**
     * @var null|Collection|Car[] $cars
     */
    protected $cars;

    /**
     * @return Car[]|null|Collection
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param Car[]|null|Collection $cars
     * @return CarAwareTrait
     */
    public function setCars($cars)
    {
        $this->cars = $cars;
        return $this;
    }
}
