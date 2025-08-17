@extends('layouts.empty')

@section('content')
    <div class="row justify-content-center" style="margin-top: 100px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="mb-2 p-2 text-center b fs-4">{{ trans('login.title') }}</div>
                </div>
                <div class="card-body">

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">{{ trans('login.email') }}</label>

                            <div class="input-group mb-2">
                                <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                                <input type="text" id="email_address" class="form-control" name="email" required
                                       autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ trans('login.password') }}</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="password" id="password" class="form-control" name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('login.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-reg mt-2"><i class="fa fa-unlock"
                                                                                          aria-hidden="true"></i>
                                {{ trans('login.login') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
