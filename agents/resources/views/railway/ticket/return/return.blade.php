<table class="ui table">
    <thead>
    <tr>
        <th>{{ trans('ticket.return.ticket') }}</th>
        <th>{{ trans('ticket.return.return amount') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($returnInformation->getTickets() as $ticket)
    <tr>
        <td>{{ $ticket->getExpressID() }}</td>
        <td>{{ $ticket->getRetTariff() }}</td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th><b>{{ trans('ticket.return.refund type') }}</b></th>
        <th>{{ $returnInformation->getRetTypeInfo() }}</th>
    </tr>
    <tr>
        <th><b>{{ trans('ticket.return.time before train departure') }}</b></th>
        <th>{{ $returnInformation->getTimeBeforeDepAsDateInterval()->format('%d.%h.%m.%s') }}</th>
    </tr>
    <tr>
        <th><b>{{ trans('ticket.return.refund amount') }}</b></th>
        <th>{{ $returnInformation->getRetTariff() }}</th>
    </tr>
    </tfoot>
</table>

<a class="btn btn-success"
   href="{{ route('ticketReturnConfirm', ['ticketId'=>$bdTicket->id]) }}">
    {{ trans('ticket.return.confirm button')}}<i class="fas fa-arrow-right"></i>
</a>
