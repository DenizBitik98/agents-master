@inject('viewUtils', "App\Services\Utils\ViewUtils")
@inject('agentes', \App\Models\Agent::class)
<input type="hidden" id="buy_form_{{$direction}}_car_type" name="buy_form[{{$direction}}][car][type]" value="{{$directionData->getCarType()}}">
<input type="hidden" id="buy_form_{{$direction}}_car_number" name="buy_form[{{$direction}}][car][number]" value="{{$directionData->getCarNumber()}}">
<input type="hidden" id="buy_form_{{$direction}}_car_service" name="buy_form[{{$direction}}][car][service]" value="{{$directionData->getCarService()}}">
<input type="hidden" id="buy_form_{{$direction}}_train" name="buy_form[{{$direction}}][train]" value="{{$directionData->getTrain()}}">
<input type="hidden" id="buy_form_{{$direction}}_isObligativeElReg" name="buy_form[{{$direction}}][isObligativeElReg]"
       value="{{$directionData->getIsObligativeElReg()}}">
<input type="hidden" id="buy_form_{{$direction}}_departureStation" name="buy_form[{{$direction}}][departureStation]"
       value="{{$directionData->getDepartureStation()}}">
<input type="hidden" id="buy_form_{{$direction}}_arrivalStation" name="buy_form[{{$direction}}][arrivalStation]"
       value="{{$directionData->getArrivalStation()}}">
<input type="hidden" id="buy_form_{{$direction}}_departureDatetime"
       name="buy_form[{{$direction}}][departureDatetime]" value="{{$directionData->getDepartureDatetime()}}">
<input type="hidden" id="buy_form_{{$direction}}_arrivalDatetime" name="buy_form[{{$direction}}][arrivalDatetime]"
       value="{{$directionData->getArrivalDatetime()}}">

<input type="hidden" id="buy_form_{{$direction}}_timeInWay" name="buy_form[{{$direction}}][timeInWay]"
       value="{{$directionData->getTimeInWay()}}">
<input type="hidden" id="buy_form_{{$direction}}_addSigns" name="buy_form[{{$direction}}][addSigns]"
       value="{{$directionData->getAddSigns()}}">

                    @if($directionData->getAddSigns() == "ЖН")
                        @php(session(['femalew' => "ЖН"]))
                    @else
                        @php(session(['femalew' => ""]))
                    @endif

@if (is_array($directionData->getSeats()) || is_object($directionData->getSeats()))

	@foreach($directionData->getSeats() as $k=>$seat)
		<input type="hidden" id="buy_form_{{$direction}}_seat_{{$k}}" name="buy_form[{{$direction}}][seats][]"
			   value="{{$seat}}">
	@endforeach

@else

		<input type="hidden" id="buy_form_empty_seat_000" name="buy_form[empty][seats][]"
			   value="000">
@endif



<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered">
            <tr>
                <td>{{ trans('direction.direction') }}</td>
                <td>
                    {{ $viewUtils->getStationNameByCode($directionData->getDepartureStation()) }} --> {{ $viewUtils->getStationNameByCode($directionData->getArrivalStation()) }}
                </td>
            </tr>
        <tr>
            <td>{{ trans('direction.date') }}</td>
            <td>
                {{$viewUtils->formatDate($directionData->getDepartureDatetime())}}
            </td>
        </tr>
            <tr>
                <td>Номер поезда</td>
                <td>{{$directionData->getTrain()}}</td>
            </tr>
        <tr>
            <td>{{ trans('direction.car number') }}</td>
            <td>{{$directionData->getCarNumber()}}</td>
        </tr>
        <tr>
            <td>{{ trans('direction.car type') }}</td>
            <td>{{$directionData->getCarType()}} {{$directionData->getCarService()}}</td>
        </tr>
        <tr>
            <td>Женский?</td>
            <td>{{ $directionData->getAddSigns() == "ЖН" ? 'Да' : 'Нет'}}</td>
        </tr>
        <tr>
            <td>{{ trans('direction.places') }}</td>
            <td>
			@if (is_array($directionData->getSeats()) || is_object($directionData->getSeats()))
				{{ implode(',', $directionData->getSeats()) }}
			@else
				-----
			@endif
			</td>
        </tr>
        <tr>
            <td>{{ trans('direction.places bound') }}</td>
            <td>
			@if (is_array($directionData->getSeats()) || is_object($directionData->getSeats()))
				{{ min($directionData->getSeats())}} - {{ max($directionData->getSeats())}}
			@else
				-----
			@endif
			</td>
        </tr>
        <tr>
            <td>{{ trans('direction.preferred places') }}</td>
            <td>
                {{$directionData->getUpDownSlider()}}
                <select id=""
                        name="buy_form[{{$direction}}][upDownSlider]">
                    @foreach($viewUtils->getUpDownOptions($directionData->getSeats()) as $k=>$v)
                        <option value="{{$v}}"
                                @if(old('buy_form.'.$direction.'.upDownSlider', '') == $v)
                                selected
                            @endif

                        >{{$k}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>{{ trans('direction.seat comp') }}</td>
            <td>
                <select id=""
                        name="buy_form[{{$direction}}][seatsComp]">
                    <option value="">Не важно</option>
                    <option value="1"
                            @if(old('buy_form.'.$direction.'.seatsComp', '') == 1)
                            selected
                        @endif

                    >Да</option>
                </select>
            </td>
        </tr>
            @if($viewUtils->isWoBeddingAvailable($directionData))
            <tr>
                <td>{{ trans('direction.without bedding') }}</td>
                <td>
                    <input type="checkbox" id="buy_form_{{$direction}}_withoutBedding" name="buy_form[{{$direction}}][withoutBedding]"
                            @if($directionData->getWithoutBedding() == true) checked @endif>
                </td>
            </tr>
            @else
            <input type="hidden" id="buy_form_{{$direction}}_withoutBedding" name="buy_form[{{$direction}}][withoutBedding]">
            @endif
        <tr>
            <td>Форма оплаты</td>
            <td>
						@php($paytype1 = "")
						@php($agent = "")
						@php($agenter = "")
						@php($agenter = Auth::user()->agent_id)
						@if($agenter != null)
							    @php($agent = $agentes->find($agenter) )
							    @php($paytype1 = $agent->pay_type)
								@if($paytype1 == 'both')
									<select id="" name="buy_form[{{$direction}}][creditCard]">
										<option value="1">Выберите форму оплаты</option>
										<option value="0" >наличный</option>
										<option value="1" >безналичный</option>
									</select>
								@endif
								@if($paytype1 == 'cashless')
									<select id="" name="buy_form[{{$direction}}][creditCard]">
										<option value="1">Выберите форму оплаты</option>
										<option value="1" >безналичный</option>
									</select>
								@endif
								@if($paytype1 == 'cash')
									<select id="" name="buy_form[{{$direction}}][creditCard]">
										<option value="0">Выберите форму оплаты</option>
										<option value="0" >наличный</option>
									</select>
								@endif
								@if($paytype1 == null)
									<select id="" name="buy_form[{{$direction}}][creditCard]">
										<option value="1">Выберите форму оплаты</option>
										<option value="1" >безналичный</option>
									</select>
								@endif
						@endif
            </td>
        </tr>
        </table>
    </div>
</div>
