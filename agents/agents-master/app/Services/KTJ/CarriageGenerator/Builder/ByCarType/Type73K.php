<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 31.05.2018
 * Time: 0:55
 */

namespace App\Services\KTJ\CarriageGenerator\Builder\ByCarType;

use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Tariff;
use App\Services\Helpers\ArrayHelper;
use App\Services\KTJ\CarriageGenerator\Builder\IBuilder;
use App\Services\KTJ\CarriageGenerator\Builder\Traits\CarAwareTrait;
use App\Services\KTJ\CarriageGenerator\Builder\Traits\CarriageAwareTrait;
use App\Services\KTJ\CarriageGenerator\Builder\Traits\PainterAwareTrait;
use App\Services\KTJ\CarriageGenerator\Builder\Traits\TariffAwareTrait;
use App\Services\KTJ\CarriageGenerator\Entity\PainterElement;
use App\Services\KTJ\CarriageGenerator\Entity\Seat;
use App\Services\KTJ\CarriageGenerator\Painter\Enum\Position;
use App\Services\KTJ\CarriageGenerator\Painter\IPainter;

/**
 * Class TresBuilder
 * @package App\Services\KTJ\CarriageGenerator\Builder\Berth
 */
class Type73K implements IBuilder
{
    const DEFAULT_CABIN_COUNT = 10;
    const DEFAULT_HALF_CABIN_COUNT = 9;

    const DEFAULT_CABIN_SEAT_COUNT = 3;
    const DEFAULT_HALF_CABIN_SEAT_COUNT = 3;

    use CarriageAwareTrait;
    use CarAwareTrait {
        setCars as setCarAware;
    }
    use TariffAwareTrait {
        setTariff as setTariffAware;
    }
    use PainterAwareTrait {
        setPainter as setPainterAware;
    }

    /**
     * @inheritDoc
     */
    public function setCars($cars): IBuilder
    {
        $this->setCarAware($cars);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setTariff(?Tariff $tariff): IBuilder
    {
        $this->setTariffAware($tariff);

        return $this;
    }

    /**
     * @inheritDoc
     */
    function setPainter(IPainter $IPainter): IBuilder
    {
        $this->setPainterAware($IPainter);

        return $this;
    }

    /**
     * @inheritDoc
     */
    function build(): IBuilder
    {
        $this->getPainter()->setRoot(new PainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.carriage', [])));
        $this->getPainter()->getRoot()->addChild($this->buildFront());
        $this->getPainter()->getRoot()->addChild($this->buildContent());
//        $this->getPainter()->getRoot()->addChild($this->buildBack());

        return $this;
    }

    /**
     * @return PainterElement
     */
    protected function buildFront(): PainterElement
    {
        $frontDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.front', []));
        $tamburDom = $this->buildTambur();
        $frontDom->addChild($tamburDom);
        $toiletDom = $this->buildToilet();
        $frontDom->addChild($toiletDom);
        $conductorDom = $this->buildConductor();
        $frontDom->addChild($conductorDom);

        return $frontDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildBack(): PainterElement
    {
        $backDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.back', []));
        $toiletDom = $this->buildToilet();
        $backDom->addChild($toiletDom);
        $tamburDom = $this->buildTambur();
        $backDom->addChild($tamburDom);

        return $backDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildContent(): PainterElement
    {
        $content = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.content', []));
        $content->addChild(
            $this->buildContentCabins(
                static::DEFAULT_CABIN_COUNT,
                static::DEFAULT_CABIN_SEAT_COUNT
            )
        );
//        $content->addChild(
//            $this->buildContentHalfCabins(
//                static::DEFAULT_HALF_CABIN_COUNT,
//                static::DEFAULT_HALF_CABIN_SEAT_COUNT,
//                static::DEFAULT_CABIN_COUNT * static::DEFAULT_CABIN_SEAT_COUNT
//            )
//        );

        return $content;
    }

    /**
     * @param $cabinCount
     * @param $cabinSeatCount
     * @param $placesCount
     *
     * @return PainterElement
     */
    protected function buildContentCabins($cabinCount, $cabinSeatCount, $placesCount = null, $reverse = false): PainterElement
    {
        $cabins = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.cabins', []));
        $cabinsArray = [];
        for ($cabinNo = 1; $cabinNo <= $cabinCount; $cabinNo++) {
            $cabin = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.cabin', []));
            for ($seatNo = 1; $seatNo <= $cabinSeatCount; $seatNo++) {


                $factor = [
                    1 => 11,
                    2 => 12,
                    3 => 21,
                    4 => 22,
                    5 => 31,
                    6 => 32,
                    7 => 41,
                    8 => 42,
                    9 => 51,
                    10 => 52,
                ];

                $placeNo = $factor[$cabinNo] + ($seatNo - 1) * 2;

                if ($placesCount && $placeNo > $placesCount) {
                    break;
                }
                $cabin->addSeat(new Seat(
                    $placeNo,
                    $this->getSeatPosition($placeNo),
                    $this->ifPlaceIsFree($placeNo),
                    ArrayHelper::merge(
                        [
                            'container' => [
                                'data-tooltip' => $this->getDataToolTip($this->getSeatPosition($placeNo))
                            ]
                        ],
                        ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                    )
                ));
            }

            $cabinsArray[] = $cabin;
        }

        if($reverse == true){
            $cabinsArray = array_reverse($cabinsArray);
        }

        foreach ($cabinsArray as $cabin){
            $cabins->addChild($cabin);
        }

        return $cabins;
    }


    /**
     * @param $seatNo
     *
     * @return Position
     */
    protected function getSeatPosition($seatNo)
    {
        if ($seatNo % 10 == 1) {
            return Position::BOTTOM_LEFT();
        }
        if ($seatNo % 10 == 2) {
            return Position::BOTTOM_RIGHT();
        }
        if ($seatNo % 10 == 3) {
            return Position::MIDDLE_LEFT();
        }
        if ($seatNo % 10 == 4) {
            return Position::MIDDLE_RIGHT();
        }
        if ($seatNo % 10 == 5) {
            return Position::TOP_LEFT();
        }
        if ($seatNo % 10 == 6) {
            return Position::TOP_RIGHT();
        }

        return Position::TOP_RIGHT();
    }
}
