@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="{{route('profileSave')}}">
                @csrf
                <input type="hidden" id="">
                <div class="formdiv flatbox-light bt-tasks">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.tariff_type') }}</label>
                                <select class="form-select" name="tariff_type" id="tariff_type">
                                    <option value="0" {{ old('tariff_type', $profile->tariff_type) == "0" ? "selected" : "" }}>Взрослый
                                    </option>
                                    <option value="1" {{ old('tariff_type', $profile->tariff_type) == "1" ? "selected" : "" }}>Детский</option>
                                </select>
                                @error('tariff_type')
                                <div class="invalid-feedback show-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.document_type_id') }}</label>
                                <select class="form-select document-type" name="document_type_id" id="document_type_id">
                                    @foreach($docTypes as $docType)
                                        <option value="{{$docType->id}}" {{ old('document_type_id', $profile->document_type_id) == $docType->id ? "selected" : ""}}>{{$docType->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('document_type_id')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.document') }}</label>
                                <input class="form-control" name="document" id="document" value="{{ old('document', $profile->document) }}">
                                @error('document')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.surname') }}</label>
                                <input class="form-control" name="surname" id="surname" value="{{ old('surname', $profile->surname) }}">
                                @error('surname')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.name') }}</label>
                                <input class="form-control" name="name" id="name" value="{{ old('name', $profile->name) }}">

                                @error('name')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.last_name') }}</label>
                                <input class="form-control" name="last_name" id="last_name" value="{{ old('last_name', $profile->last_name) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.passenger_iin') }}</label>
                                <input class="form-control" name="passenger_iin" id="passenger_iin" value="{{ old('passenger_iin', $profile->passenger_iin) }}">
                                @error('passenger_iin')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.birthday') }}</label>
                                <input class="form-control" name="birthday" id="birthday" type="date"
                                       value="{{ old('birthday', $profile->birthday) != null ? old('birthday', $profile->birthday) instanceof DateTime ? old('birthday', $profile->birthday)->format('Y-m-d') : old('birthday') : '' }}">
                                @error('birthday')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.sex') }}</label>
                                <select class="form-select" name="sex" id="sex">
                                    @foreach($sexList as $k=>$sex)
                                        <option value="{{$k}}" {{ old('sex', $profile->sex) == $k ? "selected" : "" }}>{{$sex}}</option>
                                    @endforeach
                                </select>
                                @error('sex')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.phone') }}</label>
                                <input class="form-control phone-number" name="phone" id="phone" value="{{ old('phone', $profile->phone) }}">
                                @error('phone')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.citizenship_id') }}</label>
                                <select class="form-select" name="citizenship_id" id="citizenship_id">
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{ old('citizenship_id', $profile->citizenship_id) == $country->id ? "selected" : "" }}>{{$country->name}}</option>
                                    @endforeach
                                </select>

                                @error('citizenship_id')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>{{ trans('profile.form.external_id') }}</label>
                                <input class="form-control" name="external_id" id="external_id" value="{{ old('external_id', $profile->external_id) }}">
                                @error('external_id')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>{{ trans('profile.form.note') }}</label>
                                <textarea class="form-control" name="note" id="note">{{ old('note', $profile->note) }}</textarea>
                                @error('note')
                                <div class="invalid-feedback show-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{--<input type="hidden" name="agent_id" value="{{$profile->agent_id}}">--}}
                    <input type="hidden" name="id" value="{{$profile->id}}">
                </div>
                <div class="form-group">
                    <button type="submit"
                            class="ms-2 btn btn-success mt-2 float-end">{{ trans('common.save') }}</button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('pageScript')
    <script src="/js/jquery.mask.js"></script>

    <script type="text/javascript">
        $('.phone-number').mask('8 (999) 999 9999');

        $('.document-type').change(function(){
            let $this = $(this);
            let index = $(this).data('index');
            let val = $this.val();
            let docSelector = '#document';

            /*if(val == 5){
                $(docSelector).mask('999999999');
                $(docSelector).attr('placeholder', '');
            }else*/ if(val == 0){
                $(docSelector).mask('99999999');
                $(docSelector).attr('placeholder', 'вводить без N');
            }else{
                $(docSelector).unmask();

                $(docSelector).attr('placeholder', '');
            }
        });

        $('.document-type').change();
    </script>
@endsection
