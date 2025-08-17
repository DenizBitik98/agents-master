@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ trans('balance.form.title') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p>{{ trans('balance.current balance') }}: {{$agent->current_balance}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{ route('admin_agent_balance_process') }}" class="">
                @csrf
                <input type="hidden" value="{{$agent->id}}" name="agentId">
                <input type="hidden" value="{{$type}}" name="actionType">

                <div class="formdiv flatbox-light bt-tasks">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="actionSum">{{ trans('balance.form.sum') }}</label>
                            <input class="form-control" name="actionSum" value="" id="actionSum">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="comment">{{ trans('balance.form.comment') }}</label>
                            <textarea class="form-control" name="comment" value="" id="comment"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="ms-2 btn btn-success mt-2 float-end">{{ trans('common.save') }}</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
