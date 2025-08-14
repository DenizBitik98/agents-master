@inject('viewUtils', "App\Services\Utils\ViewUtils")
<table class="resp" border="1">
    <thead>
    <tr>
        <th>{{ trans('order.list.number') }}</th>
        <th>{{ trans('order.list.tickets') }}</th>
        <th>{{ trans('order.list.date') }}</th>
        <th>{{ trans('order.list.agent name') }}</th>
        <th>{{ trans('order.list.email') }}</th>
        <th>{{ trans('order.list.bin') }}</th>
        <th>{{ trans('order.list.contract number') }}</th>
        <th>{{ trans('order.list.login') }}</th>
        <th>{{ trans('order.list.from') }}</th>
        <th>{{ trans('order.list.to') }}</th>
        <th>{{ trans('order.list.tariff type') }}</th>
        <th>{{ trans('order.list.passenger count') }}</th>
        <th>{{ trans('order.list.train number') }}</th>
        <th>{{ trans('order.list.car number') }}</th>
        <th>{{ trans('order.list.seat') }}</th>
        <th>{{ trans('order.list.service class') }}</th>
        <th>{{ trans('order.list.document number') }}</th>
        <th>{{ trans('order.list.sex') }}</th>
        <th>{{ trans('order.list.payment type') }}</th>
        <th>{{ trans('order.list.iin') }}</th>
        <th>{{ trans('order.list.cost') }}</th>
        <th>{{ trans('order.list.system commission') }}</th>
        <th>{{ trans('order.list.agent own commission') }}</th>
        <th>{{ trans('order.list.sum') }}</th>
        <th>{{ trans('order.list.currency') }}</th>
        <th>{{ trans('order.list.passenger name') }}</th>
        <th>{{ trans('order.list.status') }}</th>
        <th>{{ trans('order.list.ship date') }}</th>
        <th>{{ trans('order.list.market rate') }}</th>
        <th>{{ trans('order.list.from code') }}</th>
        <th>{{ trans('order.list.to code') }}</th>
        <th>{{ trans('order.list.arrival date') }}</th>
        <th>{{ trans('order.list.externalId') }}</th>
        <th>{{ trans('order.list.note') }}</th>
        <th>{{ trans('order.list.returnDate') }}</th>
        <th>{{ trans('order.list.provider') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->tickets}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->agent_name}}</td>
            <td>{{$order->user_email}}</td>
            <td>{{$order->bin}}</td>
            <td>{{$order->contract_number}}</td>
            <td>{{$order->username}}</td>
            <td>{{$order->direction_from}}</td>
            <td>{{$order->direction_to}}</td>
            <td>
                @if($order->tariff_type == 0)
                    {{trans('ticket.order.tariff types.adult')}}
                @elseif ($order->tariff_type == 5)
                    {{trans('ticket.order.tariff types.discount')}}
                @elseif ($order->tariff_type == 7)
                    {{trans('ticket.order.tariff types.inv')}}
                @else
                    {{trans('ticket.order.tariff types.kid')}}
                @endif
            </td>
            <td>{{$order->passengerscount}}</td>
            <td>{{$order->train_number}}</td>
            <td>{{$order->car_number}}</td>
            <td>{{$order->seat}}</td>
            <td>{{$order->service_class}}</td>
            <td>{{$order->document_number}}</td>
            <td>
                @if($order->sex === true)
                    Ж
                @elseif($order->sex === false)
                    М
                @endif
            </td>
            <td>{{$order->payment_type == 1 ? trans('ticket.order.payment types.cash') : trans('ticket.order.payment types.non cash')}}</td>
            <td>{{$viewUtils->getIinFromDocNumber($order->document_number)}}</td>
            @if($order->operation_type === 'buy')
                <td>{{$order->cost}}</td>
                <td>{{$order->system_commission}}</td>
                <td>{{$order->agents_own_commission}}</td>
                <td>{{$order->cost + $order->system_commission + $order->agents_own_commission}}</td>
            @else
                <td>-{{$order->cost}}</td>
                <td></td>
                <td></td>
                <td>-{{$order->cost}}</td>
            @endif

            <td>KZT</td>
            <td>{{$order->passengers_name}}</td>
            <td>
                @if($order->operation_type === 'buy')
                    {{ trans('reservation.status.confirmed') }}
                @elseif($order->operation_type === 'return')
                    {{ trans('reservation.status.returned') }}
                @endif
            </td>
            <td>{{$order->departuredate}}</td>
            <td>1</td>
            <td>{{$order->station_from_code}}</td>
            <td>{{$order->station_to_code}}</td>
            <td>{{$order->arrivaldate}}</td>
            <td>{{$order->external_id}}</td>
            <td>{{$order->note}}</td>
            <td>{{$order->return_date}}</td>
            <td>Мобильный портал</td>
        </tr>
    @endforeach

    </tbody>
</table>
