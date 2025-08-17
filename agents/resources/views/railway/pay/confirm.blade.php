@extends('layouts.app')
@inject('reservationUtils', "App\Services\Utils\Railway\ReservationUtils")
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    @include('orders.railway.reservation1', ['order'=>$reservation])

    @include('orders.railway.passengers', ['order'=>$reservation])

    <div>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    @include('orders.railway.cost', ['order'=>$reservation])

    <div class="ui icon blue message">
        <i class="warning icon"></i>
        <div class="message" style="font-size: 20px; font-weight: bold">Бронь истекает через: <span id="pay-timer"></span></div>
    </div>

    <button class="ui fluid teal button" type="button" id="pay-button">{{ trans('common.pay action') }}</button>

    <button class="btn btn-danger" type="button" id="order-cancel-button">{{ trans('common.cancel action') }}</button>

    <form action="{{route('cancelReservation')}}" id="order-cancel-form" method="post">
        @csrf
        <input type="hidden" name="reservationId" value="{{$reservation->id}}">
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
@endsection

@section('pageScript')
    <script type="text/javascript">
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
            var fiveMinutes = 60 * 7,
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
            $('#confirmingModal').modal('show');
            $('#confirm-form').submit();
        });

        $('#order-cancel-button').click(function(){
            if(confirm("Отклонить заказ?")){
                $('#order-cancel-form').submit();
            }
        })
    </script>
@endsection
