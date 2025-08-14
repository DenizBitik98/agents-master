<?php

namespace App\Listeners;

use App\Common\Utils\DayShiftUtils;
use App\Events\RouteSearchAfter;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\Train;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\Direction;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Train\TrainSearchResponse;
use Doctrine\Common\Collections\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\App;

class RouteSearchAfterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RouteSearchAfter  $event
     * @return void
     */
    public function handle(RouteSearchAfter $event)
    {
        $this->filterDayShift($event);
        $this->filterCarTypes($event);
    }

    function filterDayShift(RouteSearchAfter $event): TrainSearchResponse
    {
        $response = $event->getTrainSearchResponse();

        if ($event->getSearchModel()->getDayShift() == null || !count($event->getSearchModel()->getDayShift()) ) {
            return $response;
        }

        $response->setForwardDirection(
            $this->filterDayShiftDirection(
                $event,
                $response->getForwardDirection()
            )
        );
        $response->setBackwardDirection(
            $this->filterDayShiftDirection(
                $event,
                $response->getBackwardDirection()
            )
        );
        return $response;
    }


    protected function filterDayShiftDirection(RouteSearchAfter $event, ?Direction $direction = null): ?Direction
    {
        if (null == $direction) {
            return $direction;
        }

        $dayShiftUtils = App::make(DayShiftUtils::class);

        foreach ($direction->getTrains() as $trainCollection) {
            $trainCollection->setTrainsCollection(
                $trainCollection->getTrainsCollection()->filter(function (Train $train) use($event, $dayShiftUtils){
                    foreach ($event->getSearchModel()->getDayShift() as $dayShift) {
                        if ($dayShiftUtils->isDayShiftValid(
                            $train->getDepartureDateTime(),
                            $dayShift
                        )) {
                            return true;
                        }
                    }
                    return false;
                })
            );
        }

        return $direction;
    }

    //car types

    function filterCarTypes(RouteSearchAfter $event): TrainSearchResponse
    {
        $response = $event->getTrainSearchResponse();

        if($event->getSearchModel()->getCarType() == null){
            return $response;
        }

        if (is_array($event->getSearchModel()->getCarType()) && !count($event->getSearchModel()->getCarType())) {
            return $response;
        }
        if ($event->getSearchModel()->getCarType() instanceof Collection && !$event->getSearchModel()->getCarType()->count()) {
            return $response;
        }
        $response->setForwardDirection(
            $this->filterCarTypesDirection(
                $event,
                $response->getForwardDirection()
            )
        );
        $response->setBackwardDirection(
            $this->filterCarTypesDirection(
                $event,
                $response->getBackwardDirection()
            )
        );
        return $response;
    }

    protected function filterCarTypesDirection(RouteSearchAfter $event, ?Direction $direction = null): ?Direction
    {
        if (null == $direction) {
            return $direction;
        }

        foreach ($direction->getTrains() as $trainCollection) {
            $trainCollection->setTrainsCollection(
                $trainCollection->getTrainsCollection()->filter(function (Train $train) use($event){
                    foreach ($train->getCars() as $car) {
                        foreach ($event->getSearchModel()->getCarType() as $carType) {
                            if ($carType == $car->getType()) {
                                return true;
                            }
                        }
                    }
                    return false;
                })
            );
        }
        return $direction;
    }
}
