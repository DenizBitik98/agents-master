@inject('viewUtils', "App\Services\Utils\ViewUtils")

<h1>Пассажиры:</h1>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>{{ __('reservation.info.passenger name') }}</th>
        <th>{{ __('reservation.info.passenger count') }}</th>
        <th>{{ __('reservation.info.ticket type') }}</th>
        <th>{{ __('reservation.info.birth date') }}</th>

        <th>{{ __('reservation.info.seat') }}</th>
        {{--<th>{{ __('reservation.info.status') }}</th>--}}

        @if(count($order->getRailwayReservationsRelations) > 1)
            <th>{{ __('reservation.info.seat') }}</th>
            <th>{{ __('reservation.info.status') }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
        @foreach($viewUtils->getPassengers($order) as $name=>$passenger)
            <tr>
                <td>{{$name}} {{$passenger['document']}}</td>
                <td>{{$passenger['count']}}</td>
                <td>{{$passenger['type']}}</td>
                <td>{{$passenger['birthday']}}</td>

                @foreach($passenger['data'] as $data)
                    <td>{{$data['place']}}</td>
                    {{--<td>{{$data['status']}}</td>--}}
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
