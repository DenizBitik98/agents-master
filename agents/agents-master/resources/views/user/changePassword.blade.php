@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ trans('user.change password.title') }}</h1>
            <div>
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            @if($isSuccess == true)
                <div class="alert alert-success">
                    {{ trans('user.change password.your password changed') }}
                </div>
            @endif

            <form method="post" action="{{ route('changePasswordSave') }}">
                @csrf
                <input type="hidden" id="">
                <div class="formdiv flatbox-light bt-tasks">
                    <div class="form-group">
                        <label
                            for="exampleFormControlInput1">{{ trans('user.change password.current password') }}</label>
                        <input class="form-control" name="currentPassword" type="password" value="{{old('currentPassword')}}">
                        @error('currentPassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('user.change password.new password') }}</label>
                        <input class="form-control" name="newPassword" type="password" value="{{old('newPassword')}}">
                        @error('newPassword')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label
                            for="exampleFormControlInput1">{{ trans('user.change password.repeat new password') }}</label>
                        <input class="form-control" name="repeatNewPassword" type="password" value="{{old('repeatNewPassword')}}">
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
