@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route('saveEditUser')}}">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="formdiv flatbox-light bt-tasks">
                    <div class="form-group">
                        <label>{{ trans('user.form.fio') }}</label>
                        <input class="form-control" name="fio" value="{{ old('fio', $user->fio) }}">
                        @error('fio')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ trans('user.form.username') }}</label>
                        <input class="form-control" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ trans('user.form.email') }}</label>
                        <input class="form-control" name="email" value="{{ old('email', $user->email) }}" id="edituser_email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ trans('user.form.role') }}</label>
                        <select class="form-select" name="role">
                            @foreach($viewUtils->getAgentRolesList() as $k=>$role)
                                <option value="{{$k}}" {{ old('role', $user->role) == $k ? "selected" : "" }}>{{$role}}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="agent_id" value="{{$user->agent_id}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="ms-2 btn btn-success mt-2 float-end">{{ trans('common.save') }}</button>
                </div>

            </form>
        </div>
    </div>

@endsection
