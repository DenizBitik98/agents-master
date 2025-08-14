@inject('viewUtils', "App\Services\Utils\ViewUtils")

<h1>Стоимость:</h1>

<form id="confirm-form" method="post" action="{{route('confirmReservation')}}">
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
        @foreach($viewUtils->cost($order) as $k=>$cost)
            <tr>
                <td>{{trans('reservation.direction.'.$cost['direction'])}}</td>
                <td id="tariff-{{$k}}" data-value="{{$cost['tariff']}}">{{$cost['tariff']}}</td>
                <td id="fees-{{$k}}" data-value="{{$cost['fees']}}">{{$cost['fees']}}</td>
                <td>
                    <input type="text" value="{{$cost['agentFees']}}" name="agentFees[{{$cost['reservationId']}}]"
                           data-tariff-fees-sum="{{ $cost['tariff'] + $cost['fees']}}" class="agent-fees" data-id="{{$k}}">
                    @error('agentFees.'.$cost['reservationId'])
                    <div class="invalid-feedback show-error">
                        Введите целое число больше нуля
                    </div>
                    @enderror
                    {{--<input type="hidden" value="{{$cost['total']}}" name="total[]" id="total-cost-input-{{$k}}" >--}}
                </td>
                <td id="total-cost-{{$k}}" data-total-cost="{{$cost['total']}}">{{$cost['total']}}</td>
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



