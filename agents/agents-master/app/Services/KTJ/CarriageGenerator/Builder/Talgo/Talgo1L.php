<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 30.05.2018
 * Time: 9:40
 */

namespace App\Services\KTJ\CarriageGenerator\Builder\Talgo;

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
 * Class Talgo1L
 * @package App\Services\KTJ\CarriageGenerator\Builder\Talgo
 */
class Talgo1L implements IBuilder
{
    const DEFAULT_CABIN_COUNT = 5;
    const DEFAULT_CABIN_SEAT_COUNT = 2;
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
        $this->getPainter()->getRoot()->setPainterConfig(ArrayHelper::merge($this->getPainter()->getRoot()->getPainterConfig(), [
            'class' => implode(" ", [
                ArrayHelper::getValue($this->getPainter()->getRoot()->getPainterConfig(), 'class', ''),
                'talgo'
            ])
        ]));
        $this->getPainter()->getRoot()->addChild($this->buildFront());
        $this->getPainter()->getRoot()->addChild($this->buildContent());
        $this->getPainter()->getRoot()->addChild($this->buildBack());

        return $this;
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

        return $content;
    }

    /**
     * @return PainterElement
     */
    protected function buildFront(): PainterElement
    {
        $frontDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.front', []));

        return $frontDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildBack(): PainterElement
    {
        $backDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.back', []));

        return $backDom;
    }

    /**
     * @param $seatNo
     *
     * @return Position
     */
    protected function getSeatPosition($seatNo)
    {
        if ($seatNo % 4 == 0) {
            return Position::TOP_RIGHT();
        }
        if ($seatNo % 4 == 3) {
            return Position::BOTTOM_RIGHT();
        }
        if ($seatNo % 4 == 2) {
            return Position::TOP_LEFT();
        }
        if ($seatNo % 4 == 1) {
            return Position::BOTTOM_LEFT();
        }

        return Position::TOP_RIGHT();
    }

    /**
     * @param $cabinCount
     * @param $cabinSeatCount
     * @param $placesCount
     *
     * @return PainterElement
     */
    protected function buildContentCabins($cabinCount, $cabinSeatCount, $placesCount = null): PainterElement
    {
        $cabins = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.cabins', []));
        for ($cabinNo = 1; $cabinNo <= $cabinCount; $cabinNo++) {
            $cabin = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.cabin', []));
            for ($seatNo = 1; $seatNo <= $cabinSeatCount; $seatNo++) {
                $placeNo = ($cabinNo - 1) * $cabinSeatCount + $seatNo;
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

            $class = 'cs_right';
            if ($cabinNo % 2 == 0) {
                $class = 'cs_left';
            }

            $cabins->addChild($cabin);
        }

        return $cabins;
    }
}
