@extends('layouts.app')
@inject('reservationUtils', "App\Services\Utils\Railway\ReservationUtils")
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')

    <h1>Информация о заказе</h1>
    @include('orders.railway.reservation1', ['order'=>$order])

    @include('orders.railway.passengers', ['order'=>$order])

    @php($isConfirmed = false)


    <h1>Билеты:</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>{{ __('reservation.info.ticket number') }}</th>
            <th>{{ __('reservation.info.passenger name') }}</th>
            <th>{{ __('reservation.info.passenger count') }}</th>
            <th>{{ __('reservation.info.passenger cost') }}</th>
            <th>{{ __('reservation.info.ticket type') }}</th>
            <th>{{ __('reservation.info.seat') }}</th>
			<th>{{ __('reservation.info.comments') }}</th>
            <th>{{ __('reservation.info.status') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody id="tickets-table">
        @include('orders.railway.tickets.tickets', ['order'=>$order])

        </tbody>
    </table>


    @php($isNotPayed = false)

    @foreach($order->getRailwayReservationsRelations as $reservation)
        @if($reservation->status >= 3)
            @php($isConfirmed = true)
        @endif
        @if($reservation->status == 1)
            @php($isNotPayed = true)
        @endif
    @endforeach

    @if($isNotPayed == false)
    <h1>Стоимость:</h1>
    <form id="confirm-form" method="post">
        @csrf
        <input type="hidden" name="reservationId" value="{{$order->id}}">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>{{ __('reservation.cost.tariff') }}</th>
                <th>{{ __('reservation.cost.fees') }}</th>
                <th>{{ __('reservation.cost.agents fees') }}</th>
                <th>{{ __('reservation.cost.to pay') }}</th>
            </tr>
            </thead>
            <tbody>

            @php($total = 0)
            @foreach($viewUtils->costForInfo($order) as $k=>$cost)
                <tr>
                    <td>{{trans('reservation.direction.'.$cost['direction'])}}</td>
                    <td>{{$cost['tariff']}}</td>
                    <td>{{$cost['fees']}}</td>
                    <td>
                        {{$cost['agentFees']}}
                    </td>
                    <td>{{$cost['total']}}</td>
                    @php($total = $total + $cost['total'])
                </tr>
            @endforeach
            <tr>
                <td colspan="4">Прямое и обратное направление</td>
                <td id="total-cost">{{$total}}</td>
            </tr>
            </tbody>
        </table>
    </form>

    @else
    <div>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    @include('orders.railway.cost', ['order'=>$order])

    <div class="ui icon blue message">
        <i class="warning icon"></i>
        <div class="message" style="font-size: 20px; font-weight: bold">Бронь истекает через: <span id="pay-timer"></span></div>
    </div>

    <button class="ui fluid teal button" type="button" id="pay-button">{{ trans('common.pay action') }}</button>

    <button class="btn btn-danger" type="button" id="order-cancel-button">{{ trans('common.cancel action') }}</button>

    <form action="{{route('cancelReservation')}}" id="order-cancel-form" method="post">
        @csrf
        <input type="hidden" name="reservationId" value="{{$order->id}}">
    </form>
    <div class="modal" tabindex="-1" role="dialog" id="confirmingModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">Пожалуйста подождите идет оформление билетов</div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    @endif



    @if($isConfirmed == true)
    <div class="row">
        <div class="col-lg-12">

            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Загрузит билеты
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach($viewUtils->getPassengers($order) as $name=>$passenger)
                    <li><a class="dropdown-item" href="{{route('passengerTicketsPdf', ['orderId'=>$order->id, 'passengerName'=>$name])}}">{{$name}}</a></li>
                    <li><a class="dropdown-item" href="{{route('passengerTicketsPdf', ['orderId'=>$order->id, 'passengerName'=>$name, 'version'=>'new'])}}">{{$name}} новая версия</a></li>
                @endforeach

                <li><a class="dropdown-item" href="{{route('orderTicketsPdf', ['orderId'=>$order->id])}}">Загрузить все</a></li>
                <li><a class="dropdown-item" href="{{route('orderTicketsPdf', ['orderId'=>$order->id, 'version'=>'new'])}}">Загрузить все новая версия</a></li>
            </ul>

            <form action="{{ route('sendTicketsToEmail') }}" style="display: inline-block">
                <input placeholder="Введите почту" name="email" type="email" required>
                <input name="orderId" type="hidden" value="{{$order->id}}">
                <button class="btn btn-success">Выслать билеты на почту</button>
                <button class="btn btn-success" name="version" value="new">Выслать билеты на почту новая версия</button>
            </form>


        </div>
    </div>
    @endif

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Вернуть билет</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="returnTicketModalBody">
                </div>
                {{--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>--}}
            </div>
        </div>
    </div>
@endsection

@section('pageScript')

    <script type="text/javascript">

        @php($duration = $viewUtils->getOrderRemainingTime($order))


        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var cd = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(cd);
                }
            }, 1000);
        }


        window.onload = function () {
            var fiveMinutes = {{$duration}} * 60,
                display = document.querySelector('#pay-timer');
            startTimer(fiveMinutes, display);

            var timeout = setTimeout(function () {
                var payButton = document.querySelector('#pay-button');
                payButton.disabled = true;
            }, fiveMinutes * 1000)
        };
    </script>


    <script type="text/javascript">

        $('.agent-fees').change(function (){
            let $this = $(this);
            let $key = $this.data('id');
            let agentFees = $this.val();
            let itemTotal = parseFloat($this.data('tariff-fees-sum')) + parseFloat(agentFees);

            $('#total-cost-' + $key).html(itemTotal);
            $('#total-cost-' + $key).data('total-cost', itemTotal);
            //$('#total-cost-input-' + $key).val(itemTotal);

            let tt = 0;
            $('td[data-total-cost]').each(function (e){
                tt  = tt + parseFloat($(this).data('total-cost'));

            });

            $('#total-cost').text(tt);
        });

        $('#pay-button').click(function(){

            // let payButtonClick = JSON.parse(localStorage.getItem('payButtonClick') || "false");
            // if(payButtonClick !== false){
            //
            // }




            $('#confirmingModal').modal('show');
            $('#confirm-form').submit();

            localStorage.setItem("payButtonClick", JSON.stringify(Date.now()));
        });

        $('#order-cancel-button').click(function(){
            if(confirm("Отклонить заказ?")){
                $('#order-cancel-form').submit();
            }
        })
    </script>


    <script type="text/javascript">

        if($('#exampleModal').length > 0){
            let returnTicketModal = new bootstrap.Modal(document.getElementById('exampleModal'))

            $('#tickets-table').on('click', '.return-button', function (e){
                e.preventDefault();

                $('#returnTicketModalBody').load($(this).attr('href'), {}, function (){
                    returnTicketModal.show();
                });

            });

            $('#returnTicketConfirmButton').click(function (){
                returnTicketModal.hide()
            });
        }
    </script>
@endsection
