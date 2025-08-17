<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 18.05.2018
 * Time: 12:35
 */

namespace App\Services\KTJ\CarriageGenerator\Builder;

use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Tariff;
use App\Services\KTJ\CarriageGenerator\Painter\IPainter;
use Tightenco\Collect\Support\Collection;

/**
 * Class IBuilder
 * @package App\Services\KTJ\CarriageGenerator\Builder
 */
interface IBuilder
{
    /**
     * Set car for the builders
     *
     * @param Car[]|null|Collection $cars
     * @return IBuilder
     */
    function setCars($cars): IBuilder;

    /**
     * Set tariff for the builder
     *
     * @param Tariff $tariff
     *
     * @return IBuilder
     */
    function setTariff(Tariff $tariff): IBuilder;

    /**
     * Build carriage
     *
     * @return IBuilder
     */
    function build(): IBuilder;

    /**
     * Get painter of builder
     * @return IPainter
     */
    function getPainter(): IPainter;

    /**
     * Set painter of builder
     *
     * @param IPainter $IPainter
     *
     * @return IBuilder
     */
    function setPainter(IPainter $IPainter): IBuilder;

    /**
     * @param array|null $painterConfig
     *
     * @return $this
     */
    public function setPainterConfig(?array $painterConfig);

    /**
     * @param string|null $trainNumber
     *
     * @return $this
     */
    public function setTrainNumber(string $trainNumber);
    /**
     * @param string|null $carSubType
     *
     * @return $this
     */
    public function setCarSubType(string $carSubType);
}
