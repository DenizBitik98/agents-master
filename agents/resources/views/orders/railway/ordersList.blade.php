@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <a class="btn btn-success" href="{{ route('searchTrain') }}"><i class="fa-solid fa-train"></i> {{ trans('order.search route button') }}</a>
            <button class="btn btn-teal btn-sm" id="showFiltersButton" show="{{$showFilter}}">
            <i class="fa-solid fa-filter"></i> Фильтры
            </button>
        </div>

    </div>

    <form method="post" action="{{route('orders')}}" id="filters-form">
        @csrf
        <div class="formdiv flatbox-light bt-tasks" id="filters">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.orderNumber') }}</label>
                        <input class="form-control" name="searchForm[orderNumber]" value="{{$filterModel->getOrderNumber()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.ticketNumber') }}</label>
                        <input class="form-control" name="searchForm[ticketNumber]" value="{{$filterModel->getTicketNumber()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.status') }}</label>
                        <select class="form-select" name="searchForm[status]" >
                            <option></option>
                            @foreach($statuses as $k=>$status)
                                <option value="{{$k}}"
                                        @if($k== $filterModel->getStatus())
                                        selected
                                    @endif
                                >{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">{{ trans('order.searchForm.orderDateFrom') }}</label>
                                <input class="form-control" type="date" name="searchForm[orderDateFrom]" value="{{$filterModel->getOrderDateFrom() != null ? $filterModel->getOrderDateFrom()->format('Y-m-d') : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">{{ trans('order.searchForm.orderDateTo') }}</label>
                                <input class="form-control" type="date" name="searchForm[orderDateTo]" value="{{$filterModel->getOrderDateTo() != null ? $filterModel->getOrderDateTo()->format('Y-m-d') : ''}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.documentNumber') }}</label>
                        <input class="form-control" name="searchForm[documentNumber]" value="{{$filterModel->getDocumentNumber()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.passengerFirstName') }}</label>
                        <input class="form-control" name="searchForm[passengerFirstName]" value="{{$filterModel->getPassengerFirstName()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.passengerName') }}</label>
                        <input class="form-control" name="searchForm[passengerName]" value="{{$filterModel->getPassengerName()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.iin') }}</label>
                        <input class="form-control" name="searchForm[iin]" value="{{$filterModel->getIin()}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.departureStation') }}</label>
                        <input class="form-select" id="departureStation" value="{{$filterModel->getDepartureStationName()}}">
                        <input class="form-control" type="hidden" name="searchForm[departureStationCode]" id="departureStationCode" value="{{$filterModel->getDepartureStationCode()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.arrivalStation') }}</label>
                        <input class="form-select" id="arrivalStation" value="{{$filterModel->getArrivalStationName()}}">
                        <input class="form-control" type="hidden" name="searchForm[arrivalStationCode]" id="arrivalStationCode" value="{{$filterModel->getArrivalStationCode()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.departureDateFrom') }}</label>
                        <input class="form-control" type="date" name="searchForm[departureDateFrom]" value="{{$filterModel->getDepartureDateFrom() != null ? $filterModel->getDepartureDateFrom()->format('Y-m-d') : ''}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.departureDateTo') }}</label>
                        <input class="form-control" type="date" name="searchForm[departureDateTo]"
                               value="{{$filterModel->getDepartureDateTo() != null ? $filterModel->getDepartureDateTo()->format('Y-m-d') : ''}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.searchForm.userName') }}</label>
                        <input class="form-control" name="searchForm[userName]" value="{{$filterModel->getUserName()}}">
                    </div>
                </div>
                {{--<div class="col-lg-3">
                    <div>
                        <table>
                            <tr>
                                <td colspan="2" style="font-weight: bold; padding: 10px">
                                    Экспорт
                                </td>
                                <td>
                                    <input type="checkbox" value="sell" name="searchForm[dataType][]"
                                           @if(in_array('sell', is_array($filterModel->getDataTypes()) ? $filterModel->getDataTypes() : []))
                                           checked
                                        @endif
                                    > Подтвержден
                                    <br>

                                    <input type="checkbox" value="return" name="searchForm[dataType][]"
                                           @if(in_array('return', is_array($filterModel->getDataTypes()) ? $filterModel->getDataTypes() : []))
                                           checked
                                        @endif
                                    > Возвращен
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>--}}
                <div class="col-lg-3">
                    @if(Auth::user()->isAdmin())
                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{ trans('order.searchForm.agent') }}</label>
                            <select class="form-select" name="searchForm[agentId]" id="agentId">
                                <option></option>
                                @foreach($agents as $agent)
                                    <option value="{{$agent->id}}" {{ $filterModel->getAgentId() == $agent->id ? "selected" : "" }}>{{$agent->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>

                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-success" type="submit" name="filter"><i class="fa-solid fa-filter"></i> Фильтровать</button>
                    <a class="btn btn-danger" href=""><i class="fa-solid fa-filter-circle-xmark"></i> Очистить фильтр</a>
                    <button class="btn btn-teal" name="export" value="1"><i class="fa-solid fa-file-arrow-down"></i> Экспорт</button>

                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
        <input type="hidden" name="page" id="page" value="1"></input>
    </form>

    @php($showWaitAlert = false)
    <div class="alert alert-warning text-center" id="wait-alert">Внимание имеются не подтвежденные билеты, робот занимается их подтверждением, пожалуйста подождите.</div>

    <table class="resp">
        <thead>
        <tr>
            <th>{{ trans('order.list.number') }}</th>
            <th>{{ trans('order.list.tickets') }}</th>
            <th>{{ trans('order.list.date') }}</th>
            <th>{{ trans('order.list.login') }}</th>
            <th>{{ trans('order.list.direction') }}</th>
            <th>{{ trans('order.list.passenger count2') }}</th>
            <th>{{ trans('order.list.cost') }}</th>
            <th>{{ trans('order.list.status') }}</th>
            {{--<th>{{ trans('order.list.payment status') }}</th>--}}
            <th>{{ trans('order.list.ship date') }}</th>
            <th>{{ trans('order.list.number') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            @if($showWaitAlert == false && $order->order_status==\App\AppModels\RailwayReservation\ReservationStatus::RESERVATION_CONFIRMING)
            @php($showWaitAlert = true)
            @endif


            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->tickets}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->username}}</td>
                <td>{{$order->direction}}</td>
                <td>{{$order->passengerscount}}</td>
                <td>
                    @if($order->order_status > 1)
                        <table>
                            <tr>
                                <td>Тариф</td>
                                <td>{{$order->cost}}</td>
                            </tr>
                            <tr>
                                <td>СК</td>
                                <td>{{$order->system_commission}}</td>
                            </tr>
                            <tr>
                                <td>СА</td>
                                <td>{{$order->agents_own_commission}}</td>
                            </tr>
                            <tr>
                                <td>Итого</td>
                                <td>{{ $order->cost + $order->system_commission + $order->agents_own_commission}}</td>
                            </tr>
                        </table>
                    @else
                        {{$order->cost}}
                    @endif
                </td>
                <td>
                    @if($order->order_status == \App\AppModels\RailwayReservation\ReservationStatus::RESERVATION_CONFIRMING ||
                                                    $order->order_status == \App\AppModels\RailwayReservation\ReservationStatus::RESERVATION_RETURNING)
                        <i class="fas fa-spinner fa-spin"></i>
                    @endif
                    {{ trans('reservation.status.'.$viewUtils->getRailwayReservationStatusName($order->order_status))}}
                </td>
                {{--                <td>
                                    {{$order->order_status}}
                                </td>--}}
                <td>{{$order->departuredate}}</td>
                <td>
                    <a href="{{route('ordersInfo', ['reservationId'=>$order->order_number ])}}"
                       class="btn btn-success">{{ trans('order.details button') }}</a>
{{--                    @if($order->order_status == 1)
                        <a href="{{route('confirmReservation', ['reservationId'=>$order->order_number ])}}"
                           class="btn btn-danger">Оплатить</a>
                    @endif--}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @include('common.pagination', ['all'=>$count->count, 'limit'=>$limit, 'offset'=>$offset, 'page'=>$page, 'route'=>'orders'])

@endsection

@section('pageScript')
    <script type="text/javascript">
        @if($showWaitAlert == true)
            $('#wait-alert').show();
        setTimeout(function (){
            //$('#filters-form').submit();
        }, 15000);
        @else
        $('#wait-alert').hide();
        @endif
    </script>
    <script type="text/javascript">

        $('#filters').hide();

        let showFilters = function (){
            if($('#showFiltersButton').attr('show') == '1'){
                $('#filters').show();
                $('#showFiltersButtonImage').removeClass('fa-angles-down').addClass('fa-angles-up');
            }else{
                $('#filters').hide();
                $('#showFiltersButtonImage').removeClass('fa-angles-up').addClass('fa-angles-down');
            }
        }

        showFilters();

        $('#showFiltersButton').click(function (){
            if($('#showFiltersButton').attr('show') == '1'){
                $(this).attr('show', 0);
            }else{
                $(this).attr('show', 1);
            }

            showFilters();
        });


    </script>


    <script type="text/javascript">
        $('#departureStation').autocomplete({
            source: '/railway/searchStation',
            minLength: 2,
            select: function (event, ui) {
                //$('#departureStationCode').val(suggestion.data);
                $('#departureStation').val(ui.item.value);
                $('#departureStationCode').val(ui.item.id);
            }
        });

        $('#arrivalStation').autocomplete({
            source: '/railway/searchStation',
            minLength: 1,
            select: function (event, ui) {
                //$('#arrivalStationCode').val(suggestion.data);

                $('#arrivalStation').val(ui.item.value);
                $('#arrivalStationCode').val(ui.item.id);
            }
        });
    </script>

    <script type="text/javascript">
        $('.page-link').click(function(e){
            var $this = $(this);

            if($('#showFiltersButton').attr('show') == '1'){
                e.preventDefault();
                $('#page').val($this.data('page'));
                $('#filters-form').submit();
            }
        });
    </script>
@endsection
