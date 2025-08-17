<table class="table table-bordered">
    <tr>
        <td>
            {{ __('reservation.info.number')  }}
        </td>
        <td>
            {{ $reservation->getReservation->id }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.departure station')  }}
        </td>
        <td itemprop="name">
            {{ $reservation->getDepartureStation->station_name_full }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.arrival station')  }}/
        </td>
        <td>
            {{ $reservation->getArrivalStation->station_name_full }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.departure time')  }}
        </td>
        <td>
            {{ $reservation->departure_time }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.arrival time')  }}
        </td>
        <td>
            {{ $reservation->arrival_time }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.train number')  }}
        </td>
        <td>
            {{ $reservation->departure_train }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.car number')  }}
        </td>
        <td>
            {{ $reservation->car }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.carrier name')  }}
        </td>
        <td>
            {{ $reservation->car_carrier_name }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.carrier bin')  }}
        </td>
        <td>
            {{ $reservation->bin }}
        </td>
    </tr>
    <tr>
        <td>
            {{ __('reservation.info.carrier inn')  }}
        </td>
        <td>
            {{ $reservation->carrier_inn }}
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
