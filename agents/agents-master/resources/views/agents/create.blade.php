@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="/agents/save">
                @csrf
                <input type="hidden" id="">
                <div class="formdiv flatbox-light bt-tasks">
{{--                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.username') }}</label>
                        <input class="form-control" name="username">
                    </div>--}}

{{--                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.email') }}</label>
                        <input class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.password') }}</label>
                        <input class="form-control" name="password" type="password">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.repeat password') }}</label>
                        <input class="form-control" name="repeat_password" type="password">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.name') }}</label>
                        <input class="form-control" name="name">
                    </div>--}}

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.company name') }}</label>
                        <input class="form-control" name="companyName">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.phone') }}</label>
                        <input class="form-control" name="phoneNumber">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.address') }}</label>
                        <input class="form-control" name="address">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.commission') }}</label>
                        <input class="form-control" name="commission">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.agent email') }}</label>
                        <input class="form-control" name="agent_email" id="createagent_email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.bin') }}</label>
                        <input class="form-control" name="bin">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.nds') }}</label>
                        <input class="form-control" name="nds">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('agent.form.payType') }}</label>
                        <select class="form-control" id="paytype" name="paytype">
                            <option value="">Выберите форму оплаты</option>
                            <option value="cash" {{ $agent->pay_type == "cash" ? 'selected' : '' }}>наличный</option>
                            <option value="cashless" {{ $agent->pay_type == "cashless" ? 'selected' : '' }}>безналичный</option>
                            <option value="both" {{ $agent->pay_type == "both" ? 'selected' : '' }}>наличный и безналичный</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="ms-2 btn btn-success mt-2 float-end">{{ trans('common.save') }}</button>
                </div>

            </form>
        </div>
    </div>

@endsection
