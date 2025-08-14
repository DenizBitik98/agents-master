@extends('layouts.base')
@inject('viewUtils', "App\Services\Utils\ViewUtils")
@section('content')
<div class="ticket-container">
    <p class="fwb centered fs12">{{ mb_strtoupper(__('ticket.invoice.electronic invoice', [], "kz"))}}</p>
    <p class="fwb centered fs12">{{  mb_strtoupper(__('ticket.invoice.electronic invoice', [], "ru")) }}</p>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(__('ticket.invoice.number', [], "kz"))}}
            /
            {{ $viewUtils->mbUcfirst(__('ticket.invoice.number', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->tickerReturn->krs }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.ticket number', [],  "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.ticket number',[], "ru"))}}
        </p>
        <p class="righted">
            {{ $ticket->express_id}}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.order.order number', [], "kz"))}}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.order.order number', [], "ru"))}}
        </p>
        <p class="righted">
            {{ $ticket->reservation->reservation->id }}
        </p>
    </div>

    <hr>

    <div class="fs12 row">
        <p class="lefted bold">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.name', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.name', [], "ru")) }}
        </p>
        <p class="righted">
            @foreach( $ticket->getRelatedPassengers as $passenger)
            {{ $passenger->name }}
            @endforeach
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.document number', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.document number', [], "ru")) }}
        </p>
        <p class="righted">
            @foreach($ticket->getRelatedPassengers as $passenger )
            {{ $passenger->document }}
            @endforeach
        </p>
    </div>

    <hr>

    <div class="fs12 row">
        <p class="lefted bold">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.valuation kind', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.valuation kind', [], "ru")) }}
        </p>
        <p class="righted">
            @if($ticket->reservation->payment_type == 1)
            {{ $viewUtils->mbUcfirst(trans('ticket.order.payment types.cash' , [], "kz"))}}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.order.payment types.cash', [], "ru")) }}
            @else
            {{ $viewUtils->mbUcfirst(trans('ticket.order.payment types.non cash', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.order.payment types.non cash', [], "ru")) }}
            @endif
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.seat.cost', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.seat.cost', [], "ru")) }}
        </p>
        <p class="righted">
            {{ number_format($viewUtils->getTicketCost($ticket), 0, '.','') }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return amount', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return amount', [], "ru")) }}
        </p>
        <p class="righted">
            {{ number_format($ticket->tickerReturn->amount, 0, '.','') }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return commission', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return commission', [], "ru")) }}
        </p>
        <p class="righted">
            {{ number_format($ticket->tickerReturn->commission, 0, '.','') }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.information', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.information', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return types.non cash', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return types.non cash', [], "ru")) }}
        </p>
    </div>

    <hr>

    <div class="fs12 row">
        <p class="lefted bold">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.train', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.train', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->reservation->departure_train }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.car', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.car', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->reservation->car }} {{ $viewUtils->getCarText($ticket->reservation->car_type) }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.seat', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.seat', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->seats }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.ticket kind', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.ticket kind', [], "ru")) }}
        </p>
        <p class="righted">
            @if( $ticket->tariff_type == 0)
            {{ $viewUtils->mbUcfirst(trans('ticket.order.tariff types.adult', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.order.tariff types.adult', [], "ru")) }}

            @elseif($ticket->tariff_type == 5)

            {{ $viewUtils->mbUcfirst(trans('ticket.order.tariff types.discount', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.order.tariff types.discount', [], "ru")) }}

            @else
            {{ $viewUtils->mbUcfirst(trans('ticket.order.tariff types.kid', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.order.tariff types.kid', [], "ru")) }}
            @endif
        </p>
    </div>

    <hr>

    <div class="fs12 row">
        <p class="lefted bold">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.ticket route', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.ticket route', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->reservation->departureStation->station_name_full }}
            ({{ $ticket->reservation->departureStation->station_code }})
            ->
            {{ $ticket->reservation->arrivalStation->station_name_full }}
            ({{ $ticket->reservation->arrivalStation->station_code }})
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.departure', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.departure', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->getReservation->departure_time->format("d.m.Y H:i") }}
            {{ __($viewUtils->getDepartureTimeText($ticket->reservation)) }}
        </p>
    </div>

    <hr style="border: 1px dashed black;">

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.carrier', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.carrier', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->reservation->carrier }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ mb_strtoupper(trans('ticket.invoice.bin', [], "kz")) }}
            /
            {{ mb_strtoupper(trans('ticket.invoice.bin', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->reservation->bin }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.nds property', [],  "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.nds property', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->reservation->nds }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.time until departure', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.time until departure', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->reservation->departure_time->diff($ticket->tickerReturn->returned_at)->format('%d д. %H ч. %i м.') }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return time', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.return time', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $viewUtils->localizedDate($ticket->tickerReturn->returned_at, 'medium', 'short', 'ru-RU' ) }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.fks number', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.fks number', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $ticket->tickerReturn->fks }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.terminal', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.terminal', [], "ru")) }}
        </p>
        <p class="righted">
            {{ $terminal }}
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.duty information', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.duty information', [], "ru")) }}
        </p>
        <p class="righted">
        </p>
    </div>

    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.passenger signature', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.passenger signature', [], "ru")) }}
        </p>
        <p class="righted">
            _______________________________________________
        </p>
    </div>



    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.receipt confirm', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.invoice.receipt confirm', [], "ru")) }}
        </p>
        <p class="righted">
            {{ number_format($ticket->tickerReturn->amount, 0, '.',',') }}

            {{ trans('ticket.invoice.kzt', [], "ru") }}
        </p>
    </div>

{{--    <div class="fs12 row">
        <p class="lefted">
            {{ $viewUtils->mbUcfirst(trans('ticket.blank.contact phones', [], "kz")) }}
            /
            {{ $viewUtils->mbUcfirst(trans('ticket.blank.contact phones', [], "ru")) }}
        </p>
        <p class="righted">
            {{ implode(',', $contactPhones) }}
        </p>
    </div>--}}
    <div class="fs12 row">
        <p class="lefted">
            Кассирдің қолы/Подпись кассира:
        </p>
        <p class="righted">
            _______________________________________________
        </p>
    </div>
</div>
<style type="text/css">
    * {
        font-family: Arial, Helvetica, sans-serif;
        color: #000000;
    }

    /* Grid */

    div.ticket-container {
        position: relative;
        width: 210mm;
        height: 297mm;
        padding: 5mm 3mm 3mm;
        border: 1px solid #cccccc;
        background-color: #FFFFFF;
    }

    .centered {
        text-align: center;
    }

    .row {
        clear: both;
        line-height: 0.8;
        margin: 0;
        padding: 0;
    }

    .lefted {
        float: left;
    }

    .righted {
        float: right;
    }

    hr {
        width: 100%;
        clear: both
    }

    /* Fonts */

    .fwb {
        font-weight: bold;
    }

    .fs12 {
        font-size: 12px;
    }

    .bold {
        font-weight: bold;
    }
</style>
@endsection
