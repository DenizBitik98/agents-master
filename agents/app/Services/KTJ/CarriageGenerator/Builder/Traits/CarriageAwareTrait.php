<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 30.05.2018
 * Time: 3:51
 */

namespace App\Services\KTJ\CarriageGenerator\Builder\Traits;



use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Car;
use App\Services\Aware\TranslatorAwareTrait;
use App\Services\Helpers\ArrayHelper;
use App\Services\KTJ\CarriageGenerator\Entity\PainterElement;

use App\Services\KTJ\CarriageGenerator\Painter\Enum\Position;
use App\Services\KTJ\CarriageGenerator\Entity\Seat;
use Tightenco\Collect\Support\Collection;

/**
 * Trait CarriageAwareTrait
 * @package App\Services\KTJ\CarriageGenerator\Builder\Traits
 */
trait CarriageAwareTrait
{
    use TranslatorAwareTrait;

    /**
     * @return Car[]|null|Collection
     */
    abstract protected function getCars();

    /**
     * @var null|array $painterConfig
     */
    protected $painterConfig;

    /**
     * @var null|string $trainNumber
     */
    protected $trainNumber;

    /**
     * @var null|string $carSubType
     */
    protected $carSubType;

    /**
     * @return array|null
     */
    public function getPainterConfig(): ?array
    {
        return $this->painterConfig;
    }

    /**
     * @param array|null $painterConfig
     *
     * @return $this
     */
    public function setPainterConfig(?array $painterConfig)
    {
        $this->painterConfig = $painterConfig;

        return $this;
    }

    /**
     * @param string|null $trainNumber
     *
     * @return $this
     */
    public function setTrainNumber(string $trainNumber)
    {
        $this->trainNumber = $trainNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarSubType(): ?string
    {
        return $this->carSubType;
    }

    /**
     * @param string|null $carSubType
     * @return $this
     */
    public function setCarSubType(?string $carSubType)
    {
        $this->carSubType = $carSubType;

        return $this;
    }

    /**
     * @return PainterElement
     */
    protected function buildFront(): PainterElement
    {
        return $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.front', []), '&nbsp;');
    }

    /**
     * @return PainterElement
     */
    protected function buildTambur(): PainterElement
    {
        $tamburAttributes = ArrayHelper::getValue($this->painterConfig, 'dom.tambur', []);
        $tamburValue = ArrayHelper::remove($tamburAttributes, 'value', '&nbsp;');
        $tamburDom = $this->buildPainterElement($tamburAttributes, $tamburValue);

        return $tamburDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildContent(): PainterElement
    {
        return $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.content', []));
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
     * @param     $halfCabinCount
     * @param     $halfCabinSeatCount
     * @param int $seatPlaceOffset
     *
     * @return PainterElement
     */
    protected function buildContentHalfCabins($halfCabinCount, $halfCabinSeatCount, $seatPlaceOffset = 0): PainterElement
    {
        $halfCabins = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.half-cabins', []));
        for ($halfCabinNo = 1; $halfCabinNo <= $halfCabinCount; $halfCabinNo++) {
            $halfCabin = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.half-cabin', []));
            for ($seatNo = 1; $seatNo <= $halfCabinSeatCount; $seatNo++) {
                $placeNo = ($halfCabinNo - 1) * $halfCabinSeatCount + $seatNo + $seatPlaceOffset;
                $toolTip = $placeNo % 2 == 0 ? $this->translator_service->trans('sale.common.ticket info.seat position.upper') : $this->translator_service->trans('sale.common.ticket info.seat position.lower');
                $halfCabin->addSeat(
                    new Seat(
                        $placeNo,
                        $this->getSeatPosition($placeNo),
                        $this->ifPlaceIsFree($placeNo),
                        ArrayHelper::merge(
                            [
                                'container' => [
                                    'data-tooltip' => $toolTip
                                ]
                            ],
                            ArrayHelper::getValue($this->painterConfig, 'dom.seat', [])
                        )
                    )
                );
            }
            $halfCabins->addChild($halfCabin);
        }

        return $halfCabins;
    }

    /**
     * @return PainterElement
     */
    protected function buildBack(): PainterElement
    {
        return $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.back', []), '&nbsp;');
    }

    /**
     * @param array $config
     * @param null|string $value
     *
     * @return PainterElement
     */
    protected function buildPainterElement(array $config = [], ?string $value = null)
    {
        $front = new PainterElement();
        $front->setPainterConfig($config);
        $front->setValue($value);

        return $front;
    }

    /**
     * @return PainterElement
     */
    protected function buildToilet(): PainterElement
    {
        $toiletDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.toilet', []));
        $toiletDom->addChild($this->buildPainterElement([
            'tag' => 'i',
            'class' => 'fas fa-restroom big icon'
        ]));

        return $toiletDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildWasher(): PainterElement
    {
        return $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.washer', []));
    }

    /**
     * @return PainterElement
     */
    protected function buildCondition(): PainterElement
    {
        return $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.condition', []));
    }

    /**
     * @return PainterElement
     */
    protected function buildDispenser(): PainterElement
    {
        return $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.dispenser', []));
    }

    /**
     * @return PainterElement
     */
    protected function buildShower(): PainterElement
    {
        return $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.shower', []));
    }

    /**
     * @return PainterElement
     */
    protected function buildCarToilet(?string $class=''): PainterElement
    {
        $toiletDom = $this->buildPainterElement(ArrayHelper::merge(ArrayHelper::getValue($this->painterConfig, 'dom.car_toilet', []), [
            'class' => implode(" ", [
                ArrayHelper::getValue($this->painterConfig, 'class', 'car_toilet'),
                $class
            ])
        ]));

        $toiletDom->addChild($this->buildPainterElement([
            'tag' => 'i',
            'class' => 'fas fa-toilet medium icon'
        ]));

        return $toiletDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildCarShower(?string $class=''): PainterElement
    {
        $toiletDom = $this->buildPainterElement(ArrayHelper::merge(ArrayHelper::getValue($this->painterConfig, 'dom.car_shower', []), [
            'class' => implode(" ", [
                ArrayHelper::getValue($this->painterConfig, 'class', 'car_shower'),
                $class
            ])
        ]));

        $toiletDom->addChild($this->buildPainterElement([
            'tag' => 'i',
            'class' => 'big shower icon'
        ]));
        return $toiletDom;
    }

    /**
     * @return PainterElement
     */
    protected function buildConductor(): PainterElement
    {
        $conductorDom = $this->buildPainterElement(ArrayHelper::getValue($this->painterConfig, 'dom.conductor', []));
        $conductorDom->addChild($this->buildPainterElement([
            'tag' => 'i',
            'class' => 'big male icon'
        ]));

        return $conductorDom;
    }

    /**
     * Get position data tooltip
     *
     * @param Position $position
     * @param mixed $onMissing
     *
     * @return string|mixed
     */
    protected function getDataToolTip(Position $position, $onMissing = false)
    {
        return ArrayHelper::getValue([
            Position::BOTTOM_LEFT()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.lower'),
            Position::TOP_LEFT()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.upper'),
            Position::BOTTOM_MIDDLE()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.lower'),
            Position::TOP_MIDDLE()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.upper'),
            Position::BOTTOM_RIGHT()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.lower'),
            Position::TOP_RIGHT()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.upper'),
            Position::MIDDLE_LEFT()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.middle'),
            Position::MIDDLE_RIGHT()->getKey() => $this->translator_service->trans('sale.common.ticket info.seat position.middle'),
        ], $position->getKey(), $onMissing);
    }

    /**
     * Whether the place number exist in free places of cars
     * @param $placeNo
     * @return bool
     */
    protected function ifPlaceIsFree($placeNo)
    {
        $exist = false;
        foreach ($this->getCars() as $car) {
            $exist = $exist || $car->getPlaces()->exists(function ($key, $element) use ($placeNo) {
                    return (int)$element == (int)$placeNo;
                });
        }
        return $exist;
    }

    /**
     * Get Max place number
     * @param mixed $onMissing Whether should be returned on missing result
     * @return int
     */
    protected function getMaxPlace($onMissing = 0)
    {
        $max = 0;
        foreach ($this->getCars() as $car) {
            foreach ($car->getPlaces() as $place) {
                if ($place > $max) {
                    $max = $place;
                }
            }
        }
        return $max ?: $onMissing;
    }
}
