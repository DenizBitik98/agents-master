<input type="hidden" name="blanks[{{$index}}][index]" value="{{ old('blanks.'.$index.'.index', $index) }}">
<div class="blank-item">
    <div class="row">
        <div class="col-lg-12 remove-passenger-container">
            <a class="remove-passenger"><i class="fas fa-remove"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-check">
                <label class="form-check-label" for="blanks_{{$index}}_useDiscount">{{ trans('blanks.useDiscount') }}</label>
                <input type="checkbox" class="form-check-input use-discount" name="blanks[{{$index}}][useDiscount]"
                       id="blanks_{{$index}}_useDiscount" value="1" {{ old('blanks.'.$index.'.useDiscount') == true ? "checked" : "" }}>

                {{old('blanks.'.$index.'.useDiscount')}}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.discount') }}</label>
                <input class="form-control enable-on-discount" name="blanks[{{$index}}][discount]"
                       id="blanks_{{$index}}_discount"

                       {{ old('blanks.'.$index.'.useDiscount', false) == false ? "disabled" : "" }}

                       value="{{ old('blanks.'.$index.'.discount') }}">
                @error('blanks.'.$index.'.discount')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <input type="checkbox" class="form-check-input disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][savePassenger]" id="blanks_{{$index}}_savePassenger">
                <label>{{ trans('blanks.savePassenger') }}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.tariffType') }}</label>
                <select class="form-select disable-on-discount"
                        {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}

                        name="blanks[{{$index}}][tariffType]" id="blanks_{{$index}}_tariffType">
                    <option value="0" {{ old('blanks.'.$index.'.tariffType') == "0" ? "selected" : "" }}>Взрослый</option>
                    <option value="1" {{ old('blanks.'.$index.'.tariffType') == "1" ? "selected" : "" }}>Детский</option>
                </select>
                @error('blanks.'.$index.'.tariffType')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.documentType') }}</label>
                <select class="form-select disable-on-discount document-type"
                        {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                        name="blanks[{{$index}}][documentType]" id="blanks_{{$index}}_documentType" data-index="{{$index}}">

                    @foreach($docTypes as $docType)
                        <option value="{{$docType->dcts_code}}"

                            {{ old('blanks.'.$index.'.documentType') == $docType->dcts_code ? "selected" : ""}}>{{$docType->name}}
                        </option>
                    @endforeach
                </select>

                @error('blanks.'.$index.'.documentType')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.document') }}</label>
                <input class="form-control disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][document]" id="blanks_{{$index}}_document" value="{{ old('blanks.'.$index.'.document') }}">
                @error('blanks.'.$index.'.document')
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
                <label>{{ trans('blanks.surname') }}</label>
                <input class="form-control disable-on-discount blank-surname"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][surname]" id="blanks_{{$index}}_surname"
                       value="{{ old('blanks.'.$index.'.surname') }}"
                       data-index={{$index}}>
                @error('blanks.'.$index.'.surname')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.name') }}</label>
                <input class="form-control disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][name]" id="blanks_{{$index}}_name" value="{{ old('blanks.'.$index.'.name') }}">

                @error('blanks.'.$index.'.name')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.lastName') }}</label>
                <input class="form-control disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][lastName]" id="blanks_{{$index}}_lastName" value="{{ old('blanks.'.$index.'.lastName') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.passengerIin') }}</label>
                <input class="form-control disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][passengerIin]" id="blanks_{{$index}}_passengerIin" value="{{ old('blanks.'.$index.'.passengerIin') }}">
                @error('blanks.'.$index.'.passengerIin')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            {{--<div class="form-group">
                <input type="checkbox" class="form-check-input disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][passengerIinEnabled]"
                       id="blanks_{{$index}}_passengerIinEnabled" {{ old('blanks.'.$index.'.passengerIinEnabled') == true ? "checked" : "" }}>
                <label for="blanks_{{$index}}_passengerIinEnabled">{{ trans('blanks.passengerIinEnabled') }}</label>
            </div>--}}
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.sex') }}</label>
                <select class="form-select disable-on-discount"
                        {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                        name="blanks[{{$index}}][sex]" id="blanks_{{$index}}_sex">
                    @foreach($sexList as $k=>$sex)
                        <option value="{{$k}}" {{ old('blanks.'.$index.'.sex') == $k ? "selected" : "" }}>{{$sex}}</option>
                    @endforeach
                </select>
                @error('blanks.'.$index.'.sex')
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
                <label>{{ trans('blanks.phone') }}</label>
                <input class="form-control phone-number disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][phone]" id="blanks_{{$index}}_phone">
                @error('blanks.'.$index.'.phone')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <input type="checkbox" class="form-check-input disable-on-discount"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][withoutPlace]" id="blanks_{{$index}}_withoutPlace">
                <label>{{ trans('blanks.withoutPlace') }}</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.citizenship') }}</label>

                <select class="form-select disable-on-discount"
                        {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                        name="blanks[{{$index}}][citizenship]" id="blanks_{{$index}}_citizenship">
                    @foreach($countries as $country)
                        <option value="{{$country->dcts_code}}" {{ old('blanks.'.$index.'.citizenship') == $country->dcts_code ? "selected" : "" }}>{{$country->name}}</option>
                    @endforeach
                </select>

                @error('blanks.'.$index.'.citizenship')
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
                <label>{{ trans('blanks.birthday') }}</label>
                <input class="form-control disable-on-discount {{$isObligativeElReg == true ? 'required-field' : ''}}"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][birthday]" id="blanks_{{$index}}_birthday" type="date">

                @error('blanks.'.$index.'.birthday')
                <div class="invalid-feedback show-error">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <hr>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <input type="checkbox" class="form-check-input disable-on-discount use-invalid"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][isInvalidOptionEnabled]"
                       id="blanks_{{$index}}_isInvalidOptionEnabled">
                <label>{{ trans('blanks.isInvalidOptionEnabled') }}</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.iin') }}</label>
                <input class="form-control disable-on-discount enable-invalid"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][iin]" id="blanks_{{$index}}_iin" disabled="1">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.code') }}</label>
                <input class="form-control disable-on-discount enable-invalid"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][code]" id="blanks_{{$index}}_code" disabled="1">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>{{ trans('blanks.disabilityCard') }}</label>
                <input class="form-control disable-on-discount enable-invalid"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][disabilityCard]" id="blanks_{{$index}}_disabilityCard" disabled="1">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <input type="checkbox" class="form-check-input disable-on-discount enable-invalid"
                       {{ old('blanks.'.$index.'.useDiscount', false) == true ? "disabled" : "" }}
                       name="blanks[{{$index}}][consentCPPD]"
                       id="blanks_{{$index}}_consentCPPD" disabled="1">
                <label>{{ trans('blanks.consentCPPD') }}</label>
            </div>
        </div>
    </div>
</div>


