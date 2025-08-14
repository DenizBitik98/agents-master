@inject('viewUtils', "App\Services\Utils\ViewUtils")

@php($reservations = $viewUtils->sortReservations($order))


{{--    @if($viewUtils->getBoolIfElectronicTicket($order))
        <h6 style="color: green;">Этот билет имеет электронную регистрацию</h6>
    @else
        <h6 style="color: red;">Этот билет не имеет электронной регистрации</h6>
    @endif--}}

<table class="table table-bordered">
    <thead>
    <tr>
        <th>
            Информация о заказе
        </th>
        <th>Прямое направление</th>
        @if(count($reservations) > 1)
            <th>Обратное направление</th>
        @endif
    </tr>
    </thead>


    <tr>
        <td>
            {{ __('reservation.info.number')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->getReservation->id }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.departure station')  }}
        </td>
        @foreach($reservations as $reservation)
            <td itemprop="name">
                {{ $reservation->getDepartureStation->station_name_full }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.arrival station')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->getArrivalStation->station_name_full }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.departure time')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->departure_time->format('d-m-Y H:i') }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.arrival time')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->arrival_time->format('d-m-Y H:i') }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.train number')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->departure_train }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.car number')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->car }} {{ $viewUtils->getCarTypeName($reservation->car_type) }}

                @if($reservation->is_talgo == true)
                   ({{ __('reservation.info.is_talgo') }})
                @endif
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.carrier name')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->car_carrier_name }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.carrier bin')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->bin }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.carrier inn')  }}
        </td>
        @foreach($reservations as $reservation)
            <td>
                {{ $reservation->carrier_inn }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>Билет</td>
        @foreach($reservations as $reservation)
            <td>
                @php($tickets = [])
                @foreach($reservation->getRelatedTickets as $ticket)
                    @php($tickets[] = $ticket->express_id)
                @endforeach
                {{ implode(', ', $tickets) }}
            </td>
        @endforeach
    </tr>
    <tr>
        <td>Форма оплаты</td>	
                                <td>
                                    <p class="fs12 lhsmall">
                                        @if( $reservation->payment_type == 1)
                                            {{ ucfirst(trans('ticket.order.payment types.cash', [], 'ru')) }}
                                            (H)
                                        @else
                                            {{ ucfirst(trans('ticket.order.payment types.non cash', [], 'ru')) }}
                                            (W)
                                        @endif
                                    </p>
                                </td>	
	   </tr>
</table>

<table class="ui celled selectable table">
    {{--    <thead>
        <tr>
            <th>{{ 'reservation.info.ticket.number')  }}</th>
            <th>{{ 'reservation.info.passenger.name')  }}</th>
            <th>{{ 'reservation.info.passenger.count')  }}</th>
            <th>{{ 'reservation.info.ticket.type')  }}</th>
            <th>{{ 'reservation.info.seat')  }}</th>
            <th>{{ 'reservation.info.ticket.price.total')  }}</th>
            <th>{{ 'reservation.info.ticket.price.service')  }}</th>
        </thead>
        <tbody>
        {% for ticket in reservation.tickets %}

        {{ block('table', '@KlabsSaleRailway/Reservation/Information/ticket.html.twig') }}
        {% endfor %}
        </tbody>--}}
</table>
