@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ trans('user.change password.title') }}</h1>

            <form method="post" action="{{ route('changePasswordToUserSave') }}">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="formdiv flatbox-light bt-tasks">
                    <div class="form-group">
                        <label>{{ trans('user.change password.new password') }}</label>
                        <input class="form-control" name="newPassword" type="password">
                        @error('newPassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ trans('user.change password.repeat new password') }}</label>
                        <input class="form-control" name="repeatNewPassword" type="password">
                        @error('repeatNewPassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="ms-2 btn btn-success mt-2 float-end">{{ trans('common.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
