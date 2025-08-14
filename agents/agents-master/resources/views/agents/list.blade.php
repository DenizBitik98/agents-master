@extends('layouts.app')

@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="/agents/create"><i class="fa-solid fa-circle-plus"></i> {{ trans('agent.add button') }}</a>
            <!--<a class="btn btn-success"
               href="{{route('agents', ['export'=>1])}}">{{ trans('agent.buttons.export') }}</a>-->
            <button class="btn btn-teal btn-sm" id="showFiltersButton" show="{{$showFilter}}">
                Фильтры
                <i class="fa-solid fa-angles-up" id="showFiltersButtonImage"></i>
            </button>
        </div>
    </div>

    <form method="post" action="{{route('agents')}}" id="filters-form">
        @csrf
        <div class="formdiv flatbox-light bt-tasks" id="filters">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.searchForm.company_name') }}</label>
                        <input class="form-control" name="searchForm[company_name]" value="{{$filterModel->getCompanyName()}}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.searchForm.address') }}</label>
                        <input class="form-control" name="searchForm[address]" value="{{$filterModel->getAddress()}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{ trans('agent.searchForm.email') }}</label>
                            <input class="form-control" name="searchForm[email]" value="{{$filterModel->getEmail()}}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{ trans('agent.searchForm.bin') }}</label>
                            <input class="form-control" name="searchForm[bin]" value="{{$filterModel->getBin()}}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">{{ trans('agent.searchForm.is_blocked') }}</label>
                            <!--<input class="form-control" name="searchForm[is_blocked]" value="{{$filterModel->getIsBlocked()}}">-->
							<select class="form-control" id="is_blocked1" name="is_blocked1">
								<option value="" {{ old('is_blocked1') == '' ? 'selected' : '' }}>Выберите</option>
								<option value="0" {{ old('is_blocked1') == '0' ? 'selected' : '' }}>Активно</option>
								<option value="1" {{ old('is_blocked1') == '1' ? 'selected' : '' }}>Неактивно</option>
								<option value="2" {{ old('is_blocked1') == '2' ? 'selected' : '' }}>Не определено</option>
							</select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-success btn-sm" type="submit" name="filter"><i class="fa-solid fa-filter"></i> Фильтровать</button>
                        <a class="btn btn-warning btn-sm" href=""><i class="fa-solid fa-filter-circle-xmark"></i> Очистить фильтр</a>
                    <button class="btn btn-primary btn-sm" name="export" value="1"><i class="fa-solid fa-file-arrow-down"></i> Экспорт</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="page" id="page" value="1"></input>
    </form>
    <table class="resp">
        <thead>
        <tr>
            <th>{{ trans('agent.list.id') }}</th>
            <th>{{ trans('agent.list.company name') }}</th>
            <th>{{ trans('agent.list.address') }}</th>
            <th>{{ trans('agent.list.phone') }}</th>
            <th>{{ trans('agent.list.email') }}</th>
            <th>{{ trans('agent.list.current balance') }}</th>
            <th>{{ trans('agent.list.commission') }}</th>
            <th>{{ trans('agent.list.block') }}</th>
            <th>{{ trans('agent.list.payType') }}</th>
            <th>{{ trans('agent.list.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($agents as $agent)
            <tr>
                <td>{{$agent->id}}</td>
                <td>{{$agent->company_name}}</td>
                <td>{{$agent->address}}</td>
                <td>{{$agent->phone_number}}</td>
                <td>{{$agent->email}}</td>
                <td>{{$agent->current_balance}}</td>
                <td>{{$agent->commission}}</td>
                <td>{{$agent->is_blocked == true ? 'да' : 'нет'}}</td>
                <td>@if($agent->pay_type == "cash")
                        наличный
                    @elseif($agent->pay_type == "cashless")
                        безналичный
                    @elseif($agent->pay_type == "both")
                        безналичные и наличные
                    @endif</td>
                <td>
                    <a href="/agents/edit?id={{ $agent->id }}" class="btn btn-sm btn-warning m-1"><i class="fa-regular fa-pen-to-square"></i> {{ trans('common.edit') }}</a>
                    <a href="{{route('agentBalance', ['agentId'=>$agent->id])}}" class="btn btn-sm btn-primary m-1"><i class="fa-regular fa-money-bill-1"></i> {{ trans('agent.balance button') }}</a>
                    <a href="{{route('userList', ['agentId'=>$agent->id])}}" class="btn btn-sm btn-info m-1"><i class="fa-solid fa-users"></i> {{ trans('agent.users button') }}</a>
                    @if($agent->is_blocked == true)
                        <a href="{{route('unBlockAgent', ['id'=>$agent->id])}}"
                           class="btn btn-teal btn-sm m-1"><i class="fa-regular fa-circle-play"></i> {{ trans('agent.buttons.unblock') }}</a>
                    @else
                        <a href="{{route('blockAgent', ['id'=>$agent->id])}}"
                           class="btn btn-sm btn-danger m-1"><i class="fa-regular fa-circle-stop"></i> {{ trans('agent.buttons.block') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('common.pagination', ['all'=>$count->count, 'limit'=>$limit, 'offset'=>$offset, 'page'=>$page, 'route'=>'agents'])
@endsection
@section('pageScript')
    <script type="text/javascript">
        $('#filters').hide();
        let showFilters = function (){
            if($('#showFiltersButton').attr('show') == '1'){
                $('#filters').show();
                $('#showFiltersButtonImage').removeClass('fa-angles-down').addClass('fa-angles-up');
            }else{
                $('#filters').hide();
                $('#showFiltersButtonImage').removeClass('fa-angles-up').addClass('fa-angles-down');
            }
        }
        showFilters();
        $('#showFiltersButton').click(function (){
            if($('#showFiltersButton').attr('show') == '1'){
                $(this).attr('show', 0);
            }else{
                $(this).attr('show', 1);
            }
            showFilters();
        });
    </script>
    <script type="text/javascript">
        $('.page-link').click(function(e){
            var $this = $(this);
            if($('#showFiltersButton').attr('show') == '1'){
                e.preventDefault();
                $('#page').val($this.data('page'));
                $('#filters-form').submit();
            }
        });
    </script>

@endsection
