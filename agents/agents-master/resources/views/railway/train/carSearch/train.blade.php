@inject('carriageGenerator', "App\Services\KTJ\CarriageGenerator\CarriageGenerator")
@inject('carUtils', "App\KTJ\Klabs\KTJBundle\KTJ\Utils\CarUtils")
@inject('markIt', 'Helper')

<table class="ui single line structured unstackable table">
    <thead>
    <tr>
        <th>{{ trans('carSearch.train number') }}</th>
        <th>{{ trans('carSearch.class') }}</th>
        <th>{{ trans('carSearch.category') }}</th>
        <th>{{ trans('carSearch.comments') }}</th>
        <th>{{ trans('carSearch.carrier') }}</th>
        <th>{{ trans('carSearch.cost') }}</th>
        <th>{{ trans('carSearch.places') }}</th>
    </tr>
    </thead>
    <tbody class="car-container">
    @foreach($train->getCars() as $tariff)
        @php($addSigns = $tariff->getAddSigns())
        @foreach($tariff->getCarsMerged() as $carsMerged)
            @php($car = $carsMerged->first())
            @php($seatsUndef = 0)
            @php($seatsDn = 0)
            @php($seatsUp = 0)
            @php($seatsLateralDn = 0)
            @php($seatsLateralUp = 0)
			
            @php($seatsUndefDn = 0)		
            @php($seatsUndefUp = 0)	
			
            @php($seatsUndefMi = 0)	
            @php($seatsUndefSi = 0)		
			
            @php($seatsUndefd1 = 0)	
            @php($seatsUndefd2 = 0)					

            @php($seatsUndefUnknown = 0)				
			
			@php($seatsUndefAll = 0)
			@php($seatsUndefAllText1 = '')	
			@php($seatsUndefAllText2 = '')	
			@php($seatsUndefAllText3 = '')
			@php($seatsUndefAllText33 = '')		
			@php($seatsUndefAllText333 = '')	
			@php($seatsUndefAllText6 = '')			
			@php($seatsUndefAllMark = 0)

			@php($class1 = '')			
			
            @foreach($carsMerged as $car1)
                @php($seatsUndef = $seatsUndef + $car1->getSeats()->getSeatsUndef())
                @php($seatsDn = $seatsDn + $car1->getSeats()->getSeatsDn())
                @php($seatsUp = $seatsUp + $car1->getSeats()->getSeatsUp())
                @php($seatsLateralDn = $seatsLateralDn + $car1->getSeats()->getSeatsLateralDn())
                @php($seatsLateralUp = $seatsLateralUp + $car1->getSeats()->getSeatsLateralUp())
								
					@foreach($car1->getPlaces() as $cars123)
					
					@php($seatsDef = $markIt->vag_types($car1->getSubType()))
						@if($seatsDef == 1)
							    @php($seatsUndefAllText1 =  "")							
							    @php($seatsUndefAllText2 =  "все нижние места")							
							    @php($seatsUndefAllText3 =  "")								
								@php($seatsUndefDn = $seatsUndefDn + 1)		
								@php($seatsUndefAllMark = 1)								
						@endif
						@if($seatsDef == 11)
							    @php($seatsUndefAllText1 =  "")							
							    @php($seatsUndefAllText2 =  "все сидячие места")							
							    @php($seatsUndefAllText3 =  "")								
								@php($seatsUndefSi = $seatsUndefSi + 1)								
								@php($seatsUndefAllMark = 11)								
						@endif								
						@if($seatsDef == 2)
							    @php($seatsUndefAllText1 =  "")							
							    @php($seatsUndefAllText2 =  "четные номера это верхние места, нечетные номера нижние места")						
							    @php($seatsUndefAllText3 =  "")								
							
								@if(!is_numeric($cars123))
									@php($cars124 = $markIt->numer($cars123))
									@if($markIt->mark2($cars124) == false)
									   @php($seatsUndefDn = $seatsUndefDn + 1)
									@endif		
									@if($markIt->mark2($cars124) == true)
									   @php($seatsUndefUp = $seatsUndefUp + 1)		   
									@endif
								@endif								
								@if(is_numeric($cars123))
									@if($markIt->mark2($cars123) == false)
									   @php($seatsUndefDn = $seatsUndefDn + 1)
									@endif		
									@if($markIt->mark2($cars123) == true)
									   @php($seatsUndefUp = $seatsUndefUp + 1)		   
									@endif	
								@endif	
								
								@php($seatsUndefAllMark = 2)									
								
						@endif
						@if($seatsDef == 33)
							    @php($seatsUndefAllText1 =  "Нижние места – 11, 12, 21, 22, 31, 32, 41, 42, 51, 52")							
							    @php($seatsUndefAllText2 =  "Вторые полки – 13, 14, 23, 24, 33, 34, 43, 44, 53, 54")							
							    @php($seatsUndefAllText3 =  "Третьи полки – 15, 16, 25, 26, 35, 36, 45, 46, 55, 56")	
								@if($markIt->place_types33($cars123) == 'n')
										@php($seatsUndefDn = $seatsUndefDn + 1)													
								@endif	
								@if($markIt->place_types33($cars123) == 's')
										@php($seatsUndefMi = $seatsUndefMi + 1)													
								@endif	
								@if($markIt->place_types33($cars123) == 'v')
										@php($seatsUndefUp = $seatsUndefUp + 1)													
								@endif	

								@php($seatsUndefAllMark = 33)									
							
						@endif
						@if($seatsDef == 333)
							    @php($seatsUndefAllText1 =  "Третьи верхние места – 1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34, 37, 40, 43, 46, 49, 52")							
							    @php($seatsUndefAllText2 =  "Средние верхние полки – 2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35, 38, 41, 44, 47, 50, 53")							
							    @php($seatsUndefAllText3 =  "Нижние полки – 3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54")
							    @php($seatsUndefAllText33 =  "Нижние боковые полки – 55, 57, 59, 61, 63, 65, 67, 69, 71, 73, 75, 77, 79, 81")							
							    @php($seatsUndefAllText333 =  "Верхние боковые полки – 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82")									
								@if($markIt->place_types333($cars123) == 'n')
										@php($seatsUndefDn = $seatsUndefDn + 1)													
								@endif	
								@if($markIt->place_types333($cars123) == 's')
										@php($seatsUndefMi = $seatsUndefMi + 1)													
								@endif	
								@if($markIt->place_types333($cars123) == 'v')
										@php($seatsUndefUp = $seatsUndefUp + 1)													
								@endif
								@if($markIt->place_types333($cars123) == 'd1')
										@php($seatsUndefd1 = $seatsUndefd1 + 1)													
								@endif	
								@if($markIt->place_types333($cars123) == 'd2')
										@php($seatsUndefd2 = $seatsUndefd2 + 1)													
								@endif									

								@php($seatsUndefAllMark = 333)									
							
						@endif						
						@if($seatsDef == 3)
							    @php($seatsUndefAllText1 =  "Нижние места – 1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34, 37, 40, 43, 46, 49, 52, 55, 58")
								@php($seatsUndefAllText2 =  "Вторые полки – 2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35, 38, 41, 44, 47, 50, 53, 56, 59")
								@php($seatsUndefAllText3 =  "Третьи полки – 3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54, 57, 60")	

								@if($markIt->place_types3($cars123) == 'n')
										@php($seatsUndefDn = $seatsUndefDn + 1)													
								@endif	
								@if($markIt->place_types3($cars123) == 's')
										@php($seatsUndefMi = $seatsUndefMi + 1)													
								@endif	
								@if($markIt->place_types3($cars123) == 'v')
										@php($seatsUndefUp = $seatsUndefUp + 1)													
								@endif	

								@php($seatsUndefAllMark = 3)									
						@endif						
						@if($seatsDef == 5)
							@php($class1 = $markIt->vag_class($tariff->getClassService()->getType() ))							
							@if($class1 == 11)
									@php($seatsUndefAllText1 =  "все сидячие места")	
									@php($seatsUndefSi = $seatsUndefSi + 1)								
									@php($seatsUndefAllMark = 11)										
							@endif	
							@if($class1 == 333)
							    @php($seatsUndefAllText1 =  "Третьи верхние места – 1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34, 37, 40, 43, 46, 49, 52")							
							    @php($seatsUndefAllText2 =  "Средние верхние полки – 2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35, 38, 41, 44, 47, 50, 53")							
							    @php($seatsUndefAllText3 =  "Нижние полки – 3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54")
							    @php($seatsUndefAllText33 =  "Нижние боковые полки – 55, 57, 59, 61, 63, 65, 67, 69, 71, 73, 75, 77, 79, 81")							
							    @php($seatsUndefAllText333 =  "Верхние боковые полки – 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82")									
								@if($markIt->place_types333($cars123) == 'n')
										@php($seatsUndefDn = $seatsUndefDn + 1)													
								@endif	
								@if($markIt->place_types333($cars123) == 's')
										@php($seatsUndefMi = $seatsUndefMi + 1)													
								@endif	
								@if($markIt->place_types333($cars123) == 'v')
										@php($seatsUndefUp = $seatsUndefUp + 1)													
								@endif
								@if($markIt->place_types333($cars123) == 'd1')
										@php($seatsUndefd1 = $seatsUndefd1 + 1)													
								@endif	
								@if($markIt->place_types333($cars123) == 'd2')
										@php($seatsUndefd2 = $seatsUndefd2 + 1)													
								@endif									

								@php($seatsUndefAllMark = 333)									
							@endif								
							@if($class1 == 5)
									@php($seatsUndefAllText1 =  "...")	
									@php($seatsUndefUnknown = $seatsUndefUnknown + 1)								
									@php($seatsUndefAllMark = 5)										
							@endif							
						@endif							
					@endforeach				
            @endforeach
			

		  @switch ($seatsUndefAllMark)
			@case($seatsUndefAllMark == 1)
								@php($seatsUndefAll	= $seatsUndefDn)	
			  @break
			@case($seatsUndefAllMark == 11)
								@php($seatsUndefAll	= $seatsUndefSi)		
			  @break			  
			@case($seatsUndefAllMark == 2)
								@php($seatsUndefAll	= $seatsUndefDn + $seatsUndefUp)
			  @break
			@case($seatsUndefAllMark == 3)
								@php($seatsUndefAll	= $seatsUndefDn + $seatsUndefUp + $seatsUndefMi)
			  @break			  
			@case($seatsUndefAllMark == 33)
								@php($seatsUndefAll	= $seatsUndefDn + $seatsUndefUp + $seatsUndefMi)
			  @break 
			@case($seatsUndefAllMark == 333)
								@php($seatsUndefAll	= $seatsUndefDn + $seatsUndefUp + $seatsUndefMi + $seatsUndefd1 + $seatsUndefd2)
			  @break 	
			@case($seatsUndefAllMark == 5)
								@php($seatsUndefAll	= $seatsUndefUnknown)
			  @break 			  
			@default
								@php($seatsUndefAll	= 0)		  
		  @endswitch		
		  
			@php(session(['NoSeats' => 0]))			
			@if($seatsUndefAll == 0)
				@php($seatsUndefAllText6 ="Без выбора мест! (нажмите кнопку Продолжить)")
				@php(session(['NoSeats' => 1]))
            @endif								
			
            <tr class="carItemTitleRow {{ $addSigns == "ЖН" ? 'female-carriage' : ''}}"
                data-toggle="tooltip" data-placement="top" title="{{ $addSigns == "ЖН" ? trans('carSearch.car.women description') : ''}}"
            >
                <th>
                    {{$car->getNumber()}}
                    @if($train->getElRegPossible() == true)
                        <span class="car-el-reg">e</span>
                    @endif
                    {{ $addSigns == "ЖН" ? '-'. trans('carSearch.car.women') : ''}}
                </th>
                <th>{{$tariff->getClassService()->getType()}}</th>
                <th>{{$tariff->getType()}}</th>
                <th>
				@php($seatsUndefAllText4 = '')
				@php($seatsUndefAllText4 = $markIt->talgon($car1->getSubType()))
				@if($car1->getAirConditionedCar() == true)
					@if($seatsUndefAllText4 == '')
						@php($seatsUndefAllText4 = trans('carSearch.carAirConditioning'))
					@else
						@php($seatsUndefAllText4 = $seatsUndefAllText4 . ', '. trans('carSearch.carAirConditioning'))						
					@endif
                @endif
                @if($car1->getEcoFriendlyToilets() == true)
					@if($seatsUndefAllText4 == '')
						@php($seatsUndefAllText4 = trans('carSearch.ecoFriendlyToilets'))
					@else
						@php($seatsUndefAllText4 = $seatsUndefAllText4 . ', '. trans('carSearch.ecoFriendlyToilets'))					
					@endif				
                @endif
				@if($car1->getNonSmoking() == true)
					@if($seatsUndefAllText4 == '')
						@php($seatsUndefAllText4 = trans('carSearch.non_smoking'))	
					@else
						@php($seatsUndefAllText4 = $seatsUndefAllText4 . ', '. trans('carSearch.non_smoking'))				
					@endif					
                @endif	
					{{ $seatsUndefAllText4 }}	
					{{-- $car1->getSubType() --}}						
				</th>
                <th>{{$tariff->getCarrier()->getName()}}</th>
                <th>{{--$tariff->getTariff()--}} {{-- ($markIt->agent_prof()[0] == 0) ? '' : '+' . $markIt->agent_prof()[0] --}} {{-- ($markIt->agent_prof()[1] == 0) ? '' : '+' . $markIt->agent_prof()[1] --}} {{$tariff->getTariff()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]}} <span style="color: green; font-weight: bold">KZT</span></th>
                <th>@if($seatsUndefAll ==0) Итого: {{$seatsUndef}} (без выбора места)
					@else					
						@if($seatsUndefUp > 0 ) Верхние: {{$seatsUndefUp}} <br> @endif 
						@if($seatsUndefMi > 0 ) Средние: {{$seatsUndefMi}} <br>	@endif 		
						@if($seatsUndefDn > 0 ) Нижние: {{$seatsUndefDn}} <br> @endif 
						@if($seatsUndefSi > 0 ) Сидячие: {{$seatsUndefSi}} <br>	@endif 	
						@if($seatsUndefd1 > 0 ) Нижние боковые полки: {{$seatsUndefd1}} <br> @endif 
						@if($seatsUndefd2 > 0 ) Верхние боковые полки: {{$seatsUndefd2}} <br>	@endif 							
						Итого: {{$seatsUndefAll}}									
					@endif 
				</th>
            </tr>
            <tr class="content carItem"

                data-direction="{{ $direction }}"
                data-train-number="{{$train->getNumber()}}"
                data-car-type="{{$tariff->getType()}}"
                data-car-number="{{$car->getNumber()}}"
                data-car-service="{{$tariff->getClassService()->getType()}}"
                data-departure-datetime="{{ $trainCollection->getDate()->format('Y-m-d'/*, 'Asia/Almaty'*/) }}T{{ \Carbon\Carbon::createFromTimestamp(strtotime($train->getDeparture()->getTime()))->format('H:i:sP'/*, 'Asia/Almaty'*/) }}"
                data-arrival-datetime="{{ $train->getArrival()->getDate()->format('Y-m-d'/*, 'Asia/Almaty'*/) }}T{{ \Carbon\Carbon::createFromTimestamp(strtotime($train->getArrival()->getTime()))->format('H:i:sP'/*, 'Asia/Almaty'*/) }}"
                data-time-in-way="{{$train->getTimeInWay()}}"
                data-add-signs="{{$addSigns}}"
            >
                <td colspan="6">
                    @if($addSigns == "ЖН")
                        <div class="alert alert-info">
                            {{trans('carSearch.car.women description')}}
                        </div>
                    @endif
                    <div class="ui compact small message" style="background:transparent;border:none;box-shadow:none;">
                        <div class="carHelper">
                            <div class="help available">
                                {{ trans('carSearch.car.available') }}
                            </div>
                            <div class="help selected">
                                {{ trans('carSearch.car.selected') }}
                            </div>
                            <div class="help notAvailable">
                                {{ trans('carSearch.car.notAvailable') }}
                            </div>
                            <div class="help range">
                                {{ trans('carSearch.car.range') }}								
                            </div>
							<div class="alert alert-light d-flex align-items-center" role="alert">
							  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
								<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
							  </svg>
							  <div>
									@if($seatsUndefAllText1 !="" ) {{ $seatsUndefAllText1 }} <br> @endif
									@if($seatsUndefAllText2 !="" ) {{ $seatsUndefAllText2 }} <br> @endif
									@if($seatsUndefAllText3 !="" ) {{ $seatsUndefAllText3 }} <br> @endif	
									@if($seatsUndefAllText33 !="" ) {{ $seatsUndefAllText33 }} <br> @endif
									@if($seatsUndefAllText333 !="" ) {{ $seatsUndefAllText333 }} <br> @endif
									@if($seatsUndefAllText6 !="" ) <span style="color: red; font-weight: bold; font-size: 1.3em">{{ $seatsUndefAllText6 }}</span></span> <br> @endif										
							  </div>
							</div>							
                        </div>
                    </div>

                    <div class="car-map">
                        <div class="car-map-image">
                            {!!  $carriageGenerator->generateCarriage($tariff, $carsMerged, $train->getNumber(), $trainCollection->getDate(), ['dom' => [
                                            'carriage' => [
                                                'class' => 'carriage'
                                            ],
                                            'tambur' => [
                                                'class' => 'tambur',
                                                'title' => 'carriage.tambur'
                                            ],
                                            'toilet' => [
                                                'class' => 'toilet',
                                                'title' => 'carriage.toilet'
                                            ],
                                            'conductor' => [
                                                'class' => 'conductor',
                                                'title' => 'carriage.conductor'
                                            ],
                                            'front' => [
                                                'class' => 'front'
                                            ],
                                            'content' => [
                                                'class' => 'content'
                                            ],
                                            'back' => [
                                                'class' => 'back'
                                            ],
                                            'cabins' => [
                                                'class' => 'cabins'
                                            ],
                                            'cabin' => [
                                                'class' => 'cabin'
                                            ],
                                            'half-cabins' => [
                                                'class' => 'half-cabins'
                                            ],
                                            'half-cabin' => [
                                                'class' => 'half-cabin'
                                            ],
                                            'seat' => [
                                                'container' => [
                                                    'class' => 'seat ui checkbox',
                                                ],
                                                'input' => [
                                                    'class' => 'places',
                                                    'name' => 'buy_form_contract[]',
                                                    'type' => 'checkbox'
                                                ],
                                                'label' => [
                                                    'class' => 'label',
                                                    'for' => 'seat'
                                                ],
                                            ],
                                            'washer' => [
                                                'class' => 'washer',
                                                'title' => 'carriage.washer'
                                            ],
                                            'dispenser' => [
                                                'class' => 'dispenser',
                                                'title' => 'carriage.dispenser'
                                            ],
                                            'condition' => [
                                                'class' => 'condition',
                                                'title' => 'carriage.condition'
                                            ],
                                            'car_shower' => [
                                                'class' => 'car_shower',
                                                'title' => 'carriage.shower'
                                            ],
                                            'car_toilet' => [
                                                'class' => 'car_toilet',
                                                'title' => 'carriage.toilet'
                                            ],
                                            'talgo_2c_area' => [
                                                'class' => 'talgo_2c_area',
                                                'title' => ''
                                            ],
                                            'talgo_2c_area_row' => [
                                                'class' => 'talgo_2c_area_row',
                                                'title' => ''
                                            ],
                                            'talgo_2c_area_bottom' => [
                                                'class' => 'talgo_2c_area_bottom',
                                                'title' => ''
                                            ],
                                            'talgo_2c_area_chair' => [
                                                'class' => 'talgo_2c_area_chair',
                                                'title' => ''
                                            ],
                                            'talgo_2c_area_half' => [
                                                'class' => 'talgo_2c_area_half',
                                                'title' => ''
                                            ],
                                            'talgo_2c_area_row_half' => [
                                                'class' => 'talgo_2c_area_row_half',
                                                'title' => ''
                                            ],
                                        ]]) !!}
                        </div>
                    </div>

                    <div class="additional-seats-container">
                        <div class="additional-seats-title">{{ trans('carSearch.car.additional places') }}</div>
                        <div class="additional-seats">
                            {!! $carriageGenerator->generateAdditionalSeats($tariff, $carsMerged, $train->getNumber()) !!}
                        </div>
                    </div>

                    <div class="selected-seats ui message" style="">
                        {{ trans('carSearch.car.selected places') }}: <span class="result"></span>
                    </div>


                    <button class="btn btn-success make-reservation" style="">
                        {{ trans('carSearch.car.next button') }}
                        <i class="step forward icon"></i>
                    </button>
                </td>
            </tr>
        @endforeach

    @endforeach
    </tbody>
</table>
