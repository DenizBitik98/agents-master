@inject('reservationUtils', "App\Services\Utils\Railway\ReservationUtils")
@inject('viewUtils', "App\Services\Utils\ViewUtils")
@inject('markIt', 'Helper')

@foreach($order->getRailwayReservationsRelations as $reservation)

    @foreach($reservation->getRelatedTickets as $ticket)
        <tr>
            <td>{{ $ticket->express_id }}</td>
            <td>
                @foreach($ticket->getRelatedPassengers as $passenger)
                    <p>{{ $passenger->name }}</p>
                    <p>{{ $passenger->document }}</p>
                    <p>{{ $passenger->birthday != null ? $passenger->birthday->format("d.m.Y") : '' }}</p>

                @endforeach
            </td>
            <td>{{ count($ticket->getRelatedPassengers) }}</td>
            <td>

                        <table>
                            <tr>
                                <td>Тариф: &nbsp; &nbsp; &nbsp; </td>
                                <td>{{$ticket->cost}}</td>
                            </tr>
                            <tr>
                                <td>СК:</td>
                                <td>{{$ticket->system_commission}}</td>
                            </tr>
                            <tr>
                                <td>СА:</td>
                                <td>{{$ticket->agents_own_commission}}</td>
                            </tr>
                            <tr>
                                <td>Итого:</td>
                                <td>{{ $ticket->cost + $ticket->system_commission + $ticket->agents_own_commission}}</td>
                            </tr>
                        </table>

			</td>
            <td>
                {{$viewUtils->getTariffTypeName($ticket->tariff_type)}}
            </td>
            <td>
                {{$ticket->seats}}
            </td>
            <td>
                @if($ticket->car_air_conditioning == 1)
                    {{__('reservation.info.carAirConditioning')}}
                @endif
                @if($ticket->eco_friendly_toilets == 1)
                    {{__('reservation.info.ecoFriendlyToilets')}}
                @endif
            </td>
            <td>
                @if($ticket->status_id == \App\AppModels\RailwayReservation\ReservationStatus::RESERVATION_CONFIRMING ||
                        $ticket->status_id == \App\AppModels\RailwayReservation\ReservationStatus::RESERVATION_RETURNING)
                    <i class="fa-solid fa-spinner fa-spin"></i>

                    <script type="text/javascript">
                        setTimeout(function (){
                            $('#tickets-table').load('{{route('getTicketsForOrder')}}?reservationId=' + {{$order->id}});
                        }, 15000)
                    </script>
                @endif
                {{ trans('reservation.status.'.$viewUtils->getRailwayReservationStatusName($ticket->status_id))}}
            </td>
            <td>
                @if($reservation->status >= 3)
                    <a href="{{route('ticketHtml', ['ticketId'=>$ticket->id ])}}" class="btn btn-success">Просмотр</a>
                    <a href="{{route('ticketPdf', ['ticketId'=>$ticket->id ])}}" class="btn btn-success">Pdf</a>

                    <a href="{{route('ticketHtml', ['ticketId'=>$ticket->id, 'version'=>'new' ])}}" class="btn btn-success">Просмотр новая форма</a>
                    <a href="{{route('ticketPdf', ['ticketId'=>$ticket->id, 'version'=>'new' ])}}" class="btn btn-success">Pdf новая форма</a>


                    @if($ticket->status_id == \App\AppModels\RailwayReservation\ReservationStatus::RESERVATION_RETURNED || $ticket->status_id == \App\AppModels\RailwayReservation\ReservationStatus::RESERVATION_RETURNED_MANUAL)
                        <a href="{{route('ticketInvoiceHtml', ['ticketId'=>$ticket->id ])}}" class="btn btn-danger">КРС</a>
                        <a href="{{route('ticketInvoicePdf', ['ticketId'=>$ticket->id ])}}" class="btn btn-danger">КРС Pdf</a>
                    @else
                        <a href="{{route('ticketReturn', ['ticketId'=>$ticket->id ])}}" class="btn btn-danger return-button">Вернуть</a>
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
@endforeach
