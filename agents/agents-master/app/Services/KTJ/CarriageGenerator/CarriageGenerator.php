<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 18.05.2018
 * Time: 11:56
 */

namespace App\Services\KTJ\CarriageGenerator;

use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Tariff;
use App\Services\Aware\TranslatorAwareTrait;
use App\Services\KTJ\CarriageGenerator\Painter\IPainter;

use App\Services\KTJ\CarriageGenerator\Builder\BuilderGuesser;
use App\Services\KTJ\CarriageGenerator\Builder\IBuilder;

use Tightenco\Collect\Support\Collection;

/**
 * Class CarriageGenerator
 * @package App\Services\CarriageGenerator
 */
class CarriageGenerator
{
    use TranslatorAwareTrait;
    /**
     * @var null|IBuilder $builder
     */
    protected $builder;
    /**
     * @var null|BuilderGuesser $builderGuesser
     */
    protected $builderGuesser;
    /**
     * @var null|\App\Services\KTJ\CarriageGenerator\Painter\IPainter $painter
     */
    protected $painter;

    /**
     * @param null|IBuilder $builder
     *
     * @return CarriageGenerator
     */
    public function setBuilder(?IBuilder $builder): CarriageGenerator
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @param null|BuilderGuesser $builderGuesser
     *
     * @return CarriageGenerator
     */
    public function setBuilderGuesser(?BuilderGuesser $builderGuesser): CarriageGenerator
    {
        $this->builderGuesser = $builderGuesser;

        return $this;
    }

    /**
     * @param null|IPainter $painter
     *
     * @return CarriageGenerator
     */
    public function setPainter(?IPainter $painter): CarriageGenerator
    {
        $this->painter = $painter;

        return $this;
    }

    /**
     * Generate carriage view
     *
     * @param Tariff $tariff
     * @param Collection $cars
     * @param string $trainNumber
     * @param array $painterConfig
     * @return string
     */
    function generateCarriage(Tariff $tariff, Collection $cars, string $trainNumber, \DateTime $departureDate, array $painterConfig = [])
    {
        $this->setBuilder($this->builderGuesser->guessBuilder($tariff, $cars, $departureDate, $trainNumber));
        $this->builder->setTranslatorService($this->translator_service);
        $this->builder->setPainter($this->painter);
        $this->builder->setPainterConfig($painterConfig);

        $this->builder->setTrainNumber($trainNumber);

        $carSubType = null;
        /**
         * @var Car $car
         */
        foreach ($cars as $car){
            $carSubType = $car->getSubType();
        }

        $this->builder->setCarSubType($carSubType);

        return $this->builder->setCars($cars)
            ->setTariff($tariff)
            ->build()
            ->getPainter()
            ->paint();
    }

    function generateAdditionalSeats(Tariff $tariff, Collection $cars, string $trainNumber)
    {
        $additionalSeats = [];

        $carSubType = null;
        /**
         * @var Car $car
         */
        foreach ($cars as $car) {
            $carSubType = $car->getSubType();
        }

        if ($trainNumber == '009Т' || $trainNumber == '010Т') {
            return;
        }

        $limit = 36;
        if(BuilderGuesser::SUB_TYPE_01K == $carSubType){
            $limit = 38;
        }

        foreach ($cars as $car) {
            foreach ($car->getPlaces() as $place) {
                if ( $tariff->getType() === 'Купе' && $place > $limit ) {
                    $place = $out = ltrim($place, "0");
                    $additionalSeats[] = $place;
                }
                if ( $tariff->getType() === 'Плацкартный' && !$car->isThreeFloorEconomic() && $place > 54 ) {
                    $place = str_replace(0, '', $place);
                    $additionalSeats[] = $place;
                }
            }
        }

        sort($additionalSeats);
        $htmlContent = '';

        foreach ($additionalSeats as $additionalSeat) {
            $htmlContent .=  "<div class='seat ui checkbox tl'>
                                <input value='$additionalSeat' class='places hidden' name='buy_form_contract[forwardDirection][seats][]' type='checkbox' tabindex='0'>
                                <label class='label' for='seat'>$additionalSeat</label>
                              </div>";
        }
        echo $htmlContent;
    }
}
