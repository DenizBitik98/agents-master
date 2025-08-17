@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ trans('settings.change.title') }}</h1>
            @if($isSuccess == true)
                <div class="alert alert-success">
                    {{ trans('settings.success') }}
                </div>
            @endif

            <form method="post" action="{{ route('changeSettingsSave') }}">
                @csrf
                <input type="hidden" id="">
                <div class="formdiv flatbox-light bt-tasks">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ trans('settings.change.commission') }}</label>
                        <input class="form-control" name="commission" value="{{old('commission', $commission)}}" >

                        @error('commission')
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
