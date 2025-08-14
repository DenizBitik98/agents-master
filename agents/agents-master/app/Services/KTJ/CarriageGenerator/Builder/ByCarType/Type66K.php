<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.05.2018
 * Time: 16:55
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
 * Class Builder
 * @package App\Services\KTJ\CarriageGenerator\Builder\Coupe
 */
class Type66K implements IBuilder
{
    const DEFAULT_CABIN_COUNT = 9;
    const DEFAULT_CABIN_SEAT_COUNT = 4;
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
        $this->getPainter()->getRoot()->addChild($this->buildBack());

        return $this;
    }

    /**
     * @return PainterElement
     */
    protected function buildFront(): PainterElement
    {
        $frontDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.front', []));
        $toiletDom = $this->buildToilet();
        $frontDom->addChild($toiletDom);
        $conductorDom = $this->buildConductor();
        $frontDom->addChild($conductorDom);

        return $frontDom;
    }

    protected function buildBack(): PainterElement
    {
        $backDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.back', []));
        $toiletDom = $this->buildToilet();
        $backDom->addChild($toiletDom);

        return $backDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildContent(): PainterElement
    {
        $cabinCount = static::DEFAULT_CABIN_COUNT;
        $totalCountPlaces = $cabinCount * static::DEFAULT_CABIN_SEAT_COUNT;
        $content = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.content', []));
        $content->addChild(
            $this->buildContentCabins(
                $cabinCount,
                static::DEFAULT_CABIN_SEAT_COUNT,
                $totalCountPlaces
            )
        );

        return $content;
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
}
