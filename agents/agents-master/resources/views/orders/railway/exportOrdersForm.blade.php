@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <form method="post" action="{{route('exportOrders')}}" id="filters-form">
        @csrf
        <div class="formdiv flatbox-light bt-tasks" id="filters">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.exportForm.dateFrom') }}</label>
                        <input class="form-control" type="date" name="searchForm[dateFrom]" id="dateFrom">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('order.exportForm.dateTo') }}</label>
                        <input class="form-control" type="date" name="searchForm[dateTo]" id="dateTo">
                    </div>
                </div>
                <div class="col-lg-3">
                    <input type="checkbox" value="1" name="searchForm[exportBuy]"> Подтвержден
                </div>
                <div class="col-lg-3">
                    <input type="checkbox" value="1" name="searchForm[exportReturn]"> Возвращен
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @if(Auth::user()->isAdmin())
                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{ trans('order.searchForm.agent') }}</label>
                            <select class="form-select" name="searchForm[agentId]" id="agentId">
                                <option></option>
                                @foreach($agents as $agent)
                                    <option value="{{$agent->id}}" {{ $filterModel->getAgentId() == $agent->id ? "selected" : "" }}>{{$agent->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>

                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <button class="btn btn-success" name="export" value="1">Экспорт</button>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </form>
@endsection

@section('pageScript')
@endsection
