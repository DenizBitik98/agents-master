<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 30.05.2018
 * Time: 7:34
 */

namespace App\Services\KTJ\CarriageGenerator\Builder\Sedentary;

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
 * Class Builder
 * @package App\Services\KTJ\CarriageGenerator\Builder\Sedentary
 */
class Builder implements IBuilder
{
    const DEFAULT_CABIN_COUNT = 9;
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
        $this->getPainter()->getRoot()->addChild($this->buildBack());

        return $this;
    }

    /**
     * @return PainterElement
     */
    protected function buildContent(): PainterElement
    {
        $content = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.content', []));
        for ($placeNo = 1; $placeNo <= $this->getMaxPlace(); $placeNo++) {
            if ($placeNo % 4 == 3) {
                $content->addSeat(
                    new Seat(
                        $placeNo + 1,
                        Position::VERTICALLY_SORTED(),
                        $this->ifPlaceIsFree($placeNo + 1),
                        ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                    )
                );
                if ($placeNo == $this->getMaxPlace()) {
                    $content->addSeat(
                        new Seat(
                            $placeNo,
                            Position::VERTICALLY_SORTED(),
                            $this->ifPlaceIsFree($placeNo),
                            ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                        )
                    );
                }
            } elseif ($placeNo % 4 == 0) {
                $content->addSeat(
                    new Seat(
                        $placeNo - 1,
                        Position::VERTICALLY_SORTED(),
                        $this->ifPlaceIsFree($placeNo - 1),
                        ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                    )
                );
            } else {
                $content->addSeat(
                    new Seat(
                        $placeNo,
                        Position::VERTICALLY_SORTED(),
                        $this->ifPlaceIsFree($placeNo),
                        ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                    )
                );
            }
        }

        return $content;
    }
}
