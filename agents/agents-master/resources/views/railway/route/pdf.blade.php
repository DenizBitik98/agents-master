@inject('markIt', 'Helper')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .resp th, .resp td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .resp tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .resp tr:hover {
            background-color: #ddd;
        }

        @font-face {
            font-family: "DejaVu Sans";
            font-style: normal;
            font-weight: 400;
            src: url("/fonts/dejavu-sans/DejaVuSans.ttf");
            src:
                local("DejaVu Sans"),
                local("DejaVu Sans"),
                url("/fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");
        }
        body {
            font-family: "DejaVu Sans";
            font-size: 12px;
        }
    </style>
</head>

<body>


@extends('layouts.base')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

<img src="{{ public_path('img/logot.jpg') }}" alt="EcoBravo Logo" style="width: 50%; max-height: 100px;">
<!--img src="{{ public_path('img/ktz_logo.png') }}" alt="KTZ Logo" style="width: 70%; max-height: 120px;"-->



<hr style="margin-top: 20px; margin-bottom: 20px;">

<p class="fs12 fwb lhsmall" style="color: navy; font-weight: bold;">
   ДОСТУПНЫЕ ПУТИ И ПРЕДЛОЖЕНИЯ
</p>
<p>
@if($forwardDirection) Туда: {{session('departureStation')}} - {{session('arrivalStation')}}, {{session('departureDate')}} <br>  @endif
@if($backwardDirection) Обратно: {{session('arrivalStation')}} - {{session('departureStation')}}, {{session('backwardDate')}} <br>  @endif
Предложение сформировано: {{ date('Y-m-d H:i:s') }} <br>
Предложение актуально на момент формирования.
</p>

<div class="row">
    <div class="col-lg-12">
        @if($forwardDirection)
            <p>ПРЯМОЕ НАПРАВЛЕНИЕ</p>
        <table class="resp">
            <thead>
            <tr>
                <th>{{ trans('carSearch.list.train number') }}</th>
                <th>{{ trans('carSearch.list.departure') }}</th>
                <th>{{ trans('carSearch.list.time in way') }}</th>
                <th>{{ trans('carSearch.list.arrival') }}</th>
                <th>{{ trans('carSearch.list.car type') }}</th>
            </tr>
            </thead>

            <tbody>

            @foreach($forwardDirection->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)

                    <tr
                        class="{{ $train->getTrainDetail()->getIsObligativeElReg() ? 'is_obligative_el_reg-train' : '' }}"
                    >
                        <td>
                            {{ $train->getNumber2() }}

                            <div>
                                {!! implode("----->", $train->getRoute()->toArray() ) !!}
                            </div>
                        </td>

                        <td>
                            {{$viewUtils->getStationNameByCode($forwardDirection->getPassRouteCodeFrom())}}
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

                        <td>{{$train->getTimeInWay()}}</td>

                        <td>
                            {{$viewUtils->getStationNameByCode($forwardDirection->getPassRouteCodeTo())}}
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

                    </tr>
                @endforeach
            @endforeach
            @endif
            </tbody>
        </table>

            @if($backwardDirection)
                <p>ОБРАТНОЕ НАПРАВЛЕНИЕ</p>
                <table class="resp">
                    <thead>
                    <tr>
                        <th>{{ trans('carSearch.list.train number') }}</th>
                        <th>{{ trans('carSearch.list.departure') }}</th>
                        <th>{{ trans('carSearch.list.time in way') }}</th>
                        <th>{{ trans('carSearch.list.arrival') }}</th>
                        <th>{{ trans('carSearch.list.car type') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                @foreach($backwardDirection->getTrains() as $trainCollection)
                    @foreach($trainCollection->getTrainsCollection() as $train)

                        <tr
                            class="{{ $train->getTrainDetail()->getIsObligativeElReg() ? 'is_obligative_el_reg-train' : '' }}"
                        >
                            <td>
                                {{ $train->getNumber2() }}

                                <div>
                                    {!! implode("----->", $train->getRoute()->toArray() ) !!}
                                </div>
                            </td>

                            <td>
                                {{$viewUtils->getStationNameByCode($backwardDirection->getPassRouteCodeFrom())}}
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

                            <td>{{$train->getTimeInWay()}}</td>

                            <td>
                                {{$viewUtils->getStationNameByCode($backwardDirection->getPassRouteCodeTo())}}
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

                        </tr>
                    @endforeach
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

<!--</body>
</html>