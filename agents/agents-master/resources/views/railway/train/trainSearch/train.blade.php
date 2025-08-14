@inject('markIt', 'Helper')
<div class="row">
    <div class="col-lg-12">
        <table class="resp">
            <thead>
            <tr>
                <th>
                    {{ trans('carSearch.list.train number') }}
                </th>
                <th>
                    {{ trans('carSearch.list.departure') }}
                </th>
                <th>
                    {{ trans('carSearch.list.time in way') }}
                </th>
                <th>
                    {{ trans('carSearch.list.arrival') }}
                </th>
                <th>
                    {{ trans('carSearch.list.car type') }}
                </th>
                <th>

                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($direction->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                    <tr
                        data-type="{{ $directionType }}"
                        class="{{ $train->getTrainDetail()->getIsObligativeElReg() ? 'is_obligative_el_reg-train' : '' }}"
                    >
                        <td>
                            {{$train->getNumber2()}}

                            <div>

                                {!! implode("----->", $train->getRoute()->toArray() )  !!}
                            </div>

                            <a class="train-route btn btn-success"
                               data-bs-toggle="offcanvas"
                               href="#trainRoute"
                               role="button"
                               aria-controls="trainRoute"
                               data-train="{{$train->getNumber()}}"
                               data-date="{{ $train->getDepartureDateTime()->format('Y-m-d\\TH:i:s') }}"
                               data-station="{{$direction->getPassRouteCodeFrom()}}"

                            > <i class="fa-solid fa-route"></i> 
                                {{ trans('trainRoute.button') }}
                            </a>
                        </td>
                        <td>
                            {{$viewUtils->getStationNameByCode($direction->getPassRouteCodeFrom())}}
                            <div>
                                {{$viewUtils->localizedDate($train->getDepartureLocalDateTime())}}
                            </div>
                            <div>
                                ({{ trans('carSearch.list.time.local') }})
                            </div>
                            @if($train->getShowLocalDepartureTime())
                                <div>
                                    <hr>
                                </div>
                                <div>
                                    {{$viewUtils->localizedDate($train->getDepartureDateTime())}}
                                </div>
                                <span class="sub header">
                                    <i>
                                        ({{ trans('carSearch.list.time.carrier') }})
                                    </i>
                                </span>
                            @endif
                        </td>
                        {{--<td>{{$train->getArrivalLocalDateTime()->format('Y-m-d')}}</td>--}}
                        <td>{{$train->getTimeInWay()}}</td>
                        <td>
                            {{$viewUtils->getStationNameByCode($direction->getPassRouteCodeTo())}}
                            <div>
                                {{$viewUtils->localizedDate($train->getArrivalLocalDateTime())}}
                            </div>
                            <div>
                                ({{ trans('carSearch.list.time.local') }})
                            </div>

                            @if($train->getShowLocalArrivalTime())
                                <div>
                                    <hr>
                                </div>
                                <div>
                                    {{$viewUtils->localizedDate($train->getArrivalDateTime())}}
                                </div>
                                <span class="sub header">
                                    <i>
                                        ({{ trans('carSearch.list.time.carrier') }})
                                    </i>
                                </span>
                            @endif
                        </td>
                        <td>
                            @foreach($train->getCars() as $car)
                                <div>
                                    <span>
                                        {{$viewUtils->getCarTypeName($car->getType())}}
                                    </span>
                                    <span>{{--$car->getMinTariff()->getTariffValue()--}} {{-- ($markIt->agent_prof()[0] == 0) ? '' : '+' . $markIt->agent_prof()[0] --}} {{-- ($markIt->agent_prof()[1] == 0) ? '' : '+' . $markIt->agent_prof()[1] --}} {{$car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]}} <span style="color: green; font-weight: bold">KZT</span></span>
                                </div>
                            @endforeach
                        </td>
                        <td>
                            <button type="button"
                                    data-type="{!! $directionType !!}"
                                    data-station-from="{!! $direction->getPassRouteCodeFrom() !!}"
                                    data-station-to="{!! $direction->getPassRouteCodeTo() !!}"
                                    data-dep-date="{!! $train->getDepartureDateTime()->format('Y-m-d\\TH:i:s') !!}"
                                    data-train="{!! $train->getNumber() !!}"
                                    data-is_obligative_el_reg="{{ $train->getTrainDetail()->getIsObligativeElReg() ? '1' : '0' }}"
                                    class="choose_button btn btn-primary"  style="color: white" style="margin-right: 5px;">
                                <i class="fas fa-check-circle" style="margin-right: 5px;  color: white;"></i>
                                {{ trans('carSearch.list.select button') }}
                            </button>
                        </td>


                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<style>
    .choose_button {
        background-color: #008CBA;
    }
</style>
