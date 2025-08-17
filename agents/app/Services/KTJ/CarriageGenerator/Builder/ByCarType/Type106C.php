<?php


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

class Type106C implements IBuilder
{
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
                ''
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
    protected function buildFront(): PainterElement
    {
        $frontDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.front', []));
        $toiletDom = $this->buildToilet();
        $frontDom->addChild($toiletDom);

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
     * @return PainterElement
     */
    protected function buildContent(): PainterElement
    {

        $content = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.content', []));
        $upperArea = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.talgo_2c_area', []));
        $lowerArea = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.talgo_2c_area_half', []));

        $upperAreaRow = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.talgo_2c_area_row', []));
        $upperArea->addChild($upperAreaRow);

        $lowerAreaRow = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.talgo_2c_area_row_half', []));
        $lowerAreaRow->addSeat(
            new Seat(
                1,
                Position::TOP_LEFT(),
                $this->ifPlaceIsFree(1),
                ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
            )
        );
        $lowerArea->addChild($lowerAreaRow);

        for ($rowNum = 1; $rowNum <= 8; $rowNum++) {

            $upperAreaRow = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.talgo_2c_area_row', []));
            $lowerAreaRow = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.talgo_2c_area_row_half', []));
            $upperAreaRow->addSeat(
                new Seat(
                    3 * $rowNum - 1,
                    Position::BOTTOM_LEFT(),
                    $this->ifPlaceIsFree(3 * $rowNum - 1),
                    ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                )
            );

            $upperAreaRow->addSeat(
                new Seat(
                    3 * $rowNum,
                    Position::TOP_LEFT(),
                    $this->ifPlaceIsFree(3 * $rowNum),
                    ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                )
            );

            $upperArea->addChild($upperAreaRow);

            $lowerAreaRow->addSeat(
                new Seat(
                    3 * $rowNum + 1,
                    Position::TOP_LEFT(),
                    $this->ifPlaceIsFree(3 * $rowNum + 1),
                    ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                )
            );


            $lowerArea->addChild($lowerAreaRow);
        }

        $content->addChild($upperArea);
        $content->addChild($lowerArea);

        return $content;
    }

}
