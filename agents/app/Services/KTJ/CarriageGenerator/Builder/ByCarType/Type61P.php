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
use App\Services\KTJ\CarriageGenerator\Painter\Enum\Position;
use App\Services\KTJ\CarriageGenerator\Painter\IPainter;

/**
 * Class TresBuilder
 * @package App\Services\KTJ\CarriageGenerator\Builder\Berth
 */
class Type61P implements IBuilder
{
    const DEFAULT_CABIN_COUNT = 10;
    const DEFAULT_HALF_CABIN_COUNT = 9;
    const DEFAULT_CABIN_SEAT_COUNT = 6;
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
     * @param $seatNo
     *
     * @return Position
     */
    protected function getSeatPosition($seatNo)
    {
        if ($seatNo > 60) {
            if ($seatNo % 3 == 0) {
                return Position::TOP_LEFT();
            }
            if ($seatNo % 3 == 2) {
                return Position::TOP_MIDDLE();
            }
            if ($seatNo % 3 == 1) {
                return Position::TOP_RIGHT();
            }
        }
        if ($seatNo % 6 == 5) {
            return Position::MIDDLE_RIGHT();
        }
        if ($seatNo % 6 == 4) {
            return Position::BOTTOM_RIGHT();
        }
        if ($seatNo % 6 == 3) {
            return Position::TOP_LEFT();
        }
        if ($seatNo % 6 == 2) {
            return Position::MIDDLE_LEFT();
        }
        if ($seatNo % 6 == 1) {
            return Position::BOTTOM_LEFT();
        }

        return Position::TOP_RIGHT();
    }
}
