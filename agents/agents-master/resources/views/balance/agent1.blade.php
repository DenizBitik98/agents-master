@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ trans('balance.history') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p>{{ trans('balance.current balance') }}: {{$agent->current_balance}}</p>
        </div>
    </div>

    <table class="resp">
        <thead>
        <tr>
            <th>{{ trans('balance.list.id') }}</th>
            <th>{{ trans('balance.list.date') }}</th>
            <th>{{ trans('balance.list.type') }}</th>
            <th>{{ trans('balance.list.sum') }}</th>
            <th>{{ trans('balance.list.balance') }}</th>
            <th>{{ trans('balance.list.comment') }}</th>
            <th>{{ trans('balance.list.order number') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->action_date}}</td>
                <td>{{$item->action_type}}</td>
                <td>{{$item->action_sum}}</td>
                <td>{{$item->balance}}</td>
                <td>{{$item->comment}}</td>
                <td>{{$item->order_number}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
