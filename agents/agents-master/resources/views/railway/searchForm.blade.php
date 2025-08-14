@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")
@inject('markIt', 'Helper')

<head>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
</head>


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-1 bg-wghost">
                <form method="get" action="/railway/searchTrainResult">
                    @csrf


                    <!--- тут контейнер который по ендпоинту возвращает view на главной странице  -->

                    <div class="container-fluid mt-6">
                        <div class="row">
                            @foreach ($announcements as $announcement)
                                @if($announcement->date_start < \Carbon\Carbon::now() && $announcement->date_end > \Carbon\Carbon::now() && $announcement->is_active)
                                    <div class="col-md-12 mb-2">
                                        <div class="announcement-item" data-type="{{ $announcement->type }}" data-id="{{ $announcement->id }}">
                                            @if ($announcement->type == 'info' )
                                                <div class="alert alert-primary d-flex align-items-start" role="alert">
                                                    <div>
                                                        <svg class="bi flex-shrink-0 me-2 " width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                                                    </div>
                                                    <div>
                                                        {!! $announcement->text !!}
                                                    </div>
                                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @elseif ($announcement->type == 'warning' )
                                                <div class="alert alert-warning d-flex align-items-start" role="alert">
                                                    <div>
                                                        <svg class="bi flex-shrink-0 me-2 " width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                    </div>
                                                    <div>
                                                        {!! $announcement->text !!}
                                                    </div>
                                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @elseif ($announcement->type == 'error'  )
                                                <div class="alert alert-danger d-flex align-items-start" role="alert">
                                                    <div>
                                                        <svg class="bi flex-shrink-0 me-2 " width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                    </div>
                                                    <div>
                                                        {!! $announcement->text !!}
                                                    </div>
                                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!--  конец контейнера     --->

                    <div class="formdiv flatbox-light bt-tasks">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>
                                        <i class="fas fa-train"></i>
                                        {{ trans('carSearch.form.departureStationCode') }}
                                    </label>
                                    <input class="form-select" id="departureStation" value="{{$searchModel->getDepartureStationName()}}">
                                    <input class="form-control" type="hidden" name="departureStationCode" id="departureStationCode" value="{{$searchModel->getDepartureStationCode()}}">
                                    @error('departureStationCode')
                                    <div class="invalid-feedback show-error">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!--кнопка swap input логика изменения местами инпутов для станций -->
                            <div class="col-lg-2 ">
                                <button id="swap-btn" onclick="switcher()">
                                    <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M6.99 11L3 15l3.99 4v-3H14v-2H6.99v-3zM21 9l-3.99-4v3H10v2h7.01v3L21 9z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="f-orange">
                                        <i class="fa-solid fa-train-subway"></i>
                                        {{ trans('carSearch.form.arrivalStationCode') }}
                                    </label>
                                    <input class="form-select" id="arrivalStation" value="{{$searchModel->getArrivalStationName()}}">
                                    <input class="form-control" type="hidden" name="arrivalStationCode" id="arrivalStationCode" value="{{$searchModel->getArrivalStationCode()}}">
                                    @error('arrivalStationCode')
                                    <div class="invalid-feedback show-error">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fa-regular fa-calendar-plus"></i>
                                        {{ trans('carSearch.form.departureDate') }}
                                    </label>
                                    <div class="input-group mb-2">
                                        <input class="form-control" id="departureDate" name="departureDate" value="{{$viewUtils->formatDate($searchModel->getDepartureDate())}}" autocomplete="off">
                                        <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                    </div>
                                    @error('departureDate')
                                    <div class="invalid-feedback show-error">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="f-orange">
                                        <i class="fa-regular fa-calendar-minus"></i>
                                        {{ trans('carSearch.form.backwardDate') }}
                                    </label>
                                    <div class="input-group mb-2">
                                        <input class="form-control" id="backwardDate" name="backwardDate" value="{{$viewUtils->formatDate($searchModel->getBackwardDate())}}" autocomplete="off">
                                        <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                    </div>
                                    @error('backwardDate')
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
                                    <label>
                                        <i class="fa-solid fa-suitcase-rolling"></i>
                                        {{ trans('carSearch.form.carType') }}
                                    </label>
                                    <div>
                                        @foreach($carTypes as $key=>$carType)
                                            <input type="checkbox" value="{{$carType->dcts_code}}" name="carType[]"
                                                {{ $searchModel->getCarType() != null && in_array($carType->dcts_code, $searchModel->getCarType()) ? "checked" : ""}}
                                            > {{$carType->name}}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>
                                        <i class="fas fa-clock"></i>
                                        {{ trans('carSearch.form.dayShift') }}
                                    </label>
                                    <div>
                                        @foreach($dayShifts as $key=>$dayShift)
                                            <input type="checkbox" value="{{$key}}" name="dayShift[]"
                                                {{ $searchModel->getDayShift() != null &&  in_array($key, $searchModel->getDayShift()) ? "checked" : ""}}

                                            > {{$dayShift}}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>
                                        <i class="fas fa-arrows-h"></i>
										Запрос
                                    </label>
                                    <div>
										<input type="checkbox" name="days3" id="days3"> -/+3 дня
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="searchButton"><i class="fa-brands fa-searchengin"></i> {{ trans('carSearch.form.search button') }}</button>
							<a href="{{ route('searchTrain')}}" class="btn btn-primary" >Сбросить</a>
							<button type="button" onclick="search60()" class="btn btn-success" id="search60Button">Расписание</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- To PDF -->
	@php(session(['departureStation' => $searchModel->getDepartureStationName()]))
	@php(session(['departureDate' => $viewUtils->formatDate($searchModel->getDepartureDate())]))
	@php(session(['arrivalStation' => $searchModel->getArrivalStationName()]))
	@php(session(['backwardDate' => $viewUtils->formatDate($searchModel->getBackwardDate())]))

	{{-- var_dump($executionTime) --}}
	@php($startTime1 = microtime(true))

	@php($cart0 = array())
	@php($cart1 = array())
	@php($cart2 = array())
	@php($cart3 = array())
	@php($cart4 = array())
	@php($cart5 = array())
	@php($cart6 = array())

	@if($viewUtils->formatDate($searchModel->getDepartureDate()) != null && $viewUtils->formatDate($searchModel->getDepartureDate()) != '' && $viewUtils->formatDate($searchModel->getBackwardDate()) != null && $viewUtils->formatDate($searchModel->getBackwardDate()) != '')
		@if($ktjResponse)
		@if($ktjResponse->getBackwardDirection() != null && count($ktjResponse->getBackwardDirection()->getTrains()) > 0)
		@if( $ktjResponse->getForwardDirection() != null && count($ktjResponse->getForwardDirection()->getTrains()) > 0)
			<div class="forward-direction">
				<h1>{{ trans('carSearch.forward direction') }}</h1>
				@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse->getForwardDirection(), 'directionType'=>'Forward'])
			</div>
		@endif

			<div class="backward-direction">
				<h1>{{ trans('carSearch.backward direction') }}</h1>
				@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse->getBackwardDirection(), 'directionType'=>'Backward'])
			</div>
		@endif
				<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail100()" class="btn btn-primary" id="sendEmailButton100 "><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal100">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal100()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
	@php(session(['ktjid' => 0]))
	@endif
    @else
    @if( $viewUtils->formatDate($searchModel->getDepartureDate()) != null && $viewUtils->formatDate($searchModel->getDepartureDate()) != '')
		@if($ktjResponse)
            @foreach($ktjResponse->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                            @foreach($train->getCars() as $car)
								@php(array_push($cart0, $car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]))
                            @endforeach
                @endforeach
            @endforeach
		@endif
		@if($ktjResponse_add1)
            @foreach($ktjResponse_add1->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                            @foreach($train->getCars() as $car)
								@php(array_push($cart1, $car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]))
                            @endforeach
                @endforeach
            @endforeach
		@endif
		@if($ktjResponse_add2)
            @foreach($ktjResponse_add2->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                            @foreach($train->getCars() as $car)
								@php(array_push($cart2, $car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]))
                            @endforeach
                @endforeach
            @endforeach
		@endif
		@if($ktjResponse_add3)
            @foreach($ktjResponse_add3->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                            @foreach($train->getCars() as $car)
								@php(array_push($cart3, $car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]))
                            @endforeach
                @endforeach
            @endforeach
		@endif
		@if($ktjResponse_add4)
            @foreach($ktjResponse_add4->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                            @foreach($train->getCars() as $car)
								@php(array_push($cart4, $car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]))
                            @endforeach
                @endforeach
            @endforeach
		@endif
		@if($ktjResponse_add5)
            @foreach($ktjResponse_add5->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                            @foreach($train->getCars() as $car)
								@php(array_push($cart5, $car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]))
                            @endforeach
                @endforeach
            @endforeach
		@endif
		@if($ktjResponse_add6)
            @foreach($ktjResponse_add6->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)
                            @foreach($train->getCars() as $car)
								@php(array_push($cart6, $car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1]))
                            @endforeach
                @endforeach
            @endforeach
		@endif

	<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
	  <li class="nav-item" role="presentation">
		<button class="btn0 nav-link<?php echo (session('ktjid') == 0) ? ' active' : ''; ?>" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="<?php echo (session('ktjid') == 0) ? 'true' : 'false'; ?>">{{$abc0}}<hr><span>{{!empty($cart0) ?  "от " .min($cart0). " KZT" : "".$markIt->combansw(mb_strtolower(mb_substr($abc00, -9)))}}</span></button>
	  </li>
	  <li class="nav-item" role="presentation">
		<button class="btn1 nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">{{$abc1}}<hr><span>{{!empty($cart1) ?  "от " .min($cart1). " KZT" : "".$markIt->combansw(mb_strtolower(mb_substr($abc11, -9)))}}</span></button>
	  </li>
	  <li class="nav-item" role="presentation">
		<button class="btn2 nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false">{{$abc2}}<hr><span>{{!empty($cart2) ?  "от " .min($cart2). " KZT" : "".$markIt->combansw(mb_strtolower(mb_substr($abc22, -9)))}}</span></button>
	  </li>
	  <li class="nav-item" role="presentation">
		<button class="btn3 nav-link<?php echo (session('ktjid') == 3) ? ' active' : ''; ?>" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="<?php echo (session('ktjid') == 3) ? 'true' : 'false'; ?>">{{$abc3}}<hr><span>{{!empty($cart3) ?  "от " .min($cart3). " KZT" : "".$markIt->combansw(mb_strtolower(mb_substr($abc33, -9)))}}</span></button>
	  </li>
	  <li class="nav-item" role="presentation">
		<button class="btn4 nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5" aria-selected="false">{{$abc4}}<hr><span>{{!empty($cart4) ?  "от " .min($cart4). " KZT" : "".$markIt->combansw(mb_strtolower(mb_substr($abc44, -9)))}}</span></button>
	  </li>
	  <li class="nav-item" role="presentation">
		<button class="btn5 nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button" role="tab" aria-controls="pills-6" aria-selected="false">{{$abc5}}<hr><span>{{!empty($cart5) ?  "от " .min($cart5). " KZT" : "".$markIt->combansw(mb_strtolower(mb_substr($abc55, -9)))}}</span></button>
	  </li>
	  <li class="nav-item" role="presentation">
		<button class="btn6 nav-link" id="pills-7-tab" data-bs-toggle="pill" data-bs-target="#pills-7" type="button" role="tab" aria-controls="pills-7" aria-selected="false">{{$abc6}}<hr><span>{{!empty($cart6) ?  "от " .min($cart6). " KZT" : "".$markIt->combansw(mb_strtolower(mb_substr($abc66, -9)))}}</span></button>
	  </li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
	  <div class="tab-pane fade<?php echo (session('ktjid') == 0) ? ' show active' : ''; ?>" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
		@if($ktjResponse)
			@if( $ktjResponse->getForwardDirection() != null && count($ktjResponse->getForwardDirection()->getTrains()) > 0)
				<div class="forward-direction">
					<h1>{{ trans('carSearch.forward direction') }}</h1>
					@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse->getForwardDirection(), 'directionType'=>'Forward'])
				</div>

                {{--закоменчено на время--}}
				{{--<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail()" class="btn btn-primary" id="sendEmailButton"><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>--}}

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			@endif
		@endif
	  </div>
	  <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
		@if($ktjResponse_add1)
			@if( $ktjResponse_add1->getForwardDirection() != null && count($ktjResponse_add1->getForwardDirection()->getTrains()) > 0)
				<div class="forward-direction">
					<h1>{{ trans('carSearch.forward direction') }}</h1>
					@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse_add1->getForwardDirection(), 'directionType'=>'Forward'])
				</div>

				<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail1()" class="btn btn-primary" id="sendEmailButton1 "><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal1">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal1()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			@endif
		@endif
	  </div>
	  <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
		@if($ktjResponse_add2)
			@if( $ktjResponse_add2->getForwardDirection() != null && count($ktjResponse_add2->getForwardDirection()->getTrains()) > 0)
				<div class="forward-direction">
					<h1>{{ trans('carSearch.forward direction') }}</h1>
					@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse_add2->getForwardDirection(), 'directionType'=>'Forward'])
				</div>

				<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail2()" class="btn btn-primary" id="sendEmailButton2 "><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal2">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal2()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			@endif
		@endif
	  </div>
	  <div class="tab-pane fade<?php echo (session('ktjid') == 3) ? ' show active' : ''; ?>" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
		@if($ktjResponse_add3)
			@if( $ktjResponse_add3->getForwardDirection() != null && count($ktjResponse_add3->getForwardDirection()->getTrains()) > 0)
				<div class="forward-direction">
					<h1>{{ trans('carSearch.forward direction') }}</h1>
					@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse_add3->getForwardDirection(), 'directionType'=>'Forward'])
				</div>

				<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail3()" class="btn btn-primary" id="sendEmailButton3 "><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal3">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal3()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			@endif
		@endif
	  </div>
	  <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
		@if($ktjResponse_add4)
			@if( $ktjResponse_add4->getForwardDirection() != null && count($ktjResponse_add4->getForwardDirection()->getTrains()) > 0)
				<div class="forward-direction">
					<h1>{{ trans('carSearch.forward direction') }}</h1>
					@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse_add4->getForwardDirection(), 'directionType'=>'Forward'])
				</div>

				<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail4()" class="btn btn-primary" id="sendEmailButton4 "><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal4">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal4()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			@endif
		@endif
	  </div>
	  <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
		@if($ktjResponse_add5)
			@if( $ktjResponse_add5->getForwardDirection() != null && count($ktjResponse_add5->getForwardDirection()->getTrains()) > 0)
				<div class="forward-direction">
					<h1>{{ trans('carSearch.forward direction') }}</h1>
					@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse_add5->getForwardDirection(), 'directionType'=>'Forward'])
				</div>

				<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail5()" class="btn btn-primary" id="sendEmailButton5 "><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal5">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal5()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			@endif
		@endif
	  </div>
	  <div class="tab-pane fade" id="pills-7" role="tabpanel" aria-labelledby="pills-7-tab">
		@if($ktjResponse_add6)
			@if( $ktjResponse_add6->getForwardDirection() != null && count($ktjResponse_add6->getForwardDirection()->getTrains()) > 0)
				<div class="forward-direction">
					<h1>{{ trans('carSearch.forward direction') }}</h1>
					@include('railway.train.trainSearch.train', ['direction'=>$ktjResponse_add6->getForwardDirection(), 'directionType'=>'Forward'])
				</div>

				<form method="post" action="{{route('routePdf')}}">
					@csrf
				<div style="margin-top: 20px">
					<button type="button" onclick="sendEmail6()" class="btn btn-primary" id="sendEmailButton6 "><i class="fas fa-paper-plane"></i>
						{{ trans('railwayRoute.send email') }}</button>
					<button type="submit" class="btn btn-primary" >Скачать тут</button>
				</div>
				</form>

				<form method="post" action="{{route('sendRailwayRoutesToEmail')}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal6">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal6()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>
			@endif
		@endif
	  </div>
	</div>

    @endif
    @endif

    <!-- Modal -->
    <div class="modal fade" id="loadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="alert alert-danger" id="station-loads-alert" style="display: block; ">
                        <i class="fas fa-spinner fa-spin"></i>
                        Обновляем станции пожалуйста подождите
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div id='loader'></div>

    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" id="forwardToChoosePlacesButton">{{ trans('carSearch.forward to choose places button') }} <i class="fas fa-arrow-right"></i></button>
        </div>
    </div>

    <form action="/railway/searchCarsResult" id="carSearchForm">

        <input type="hidden" id="carSearchForwardDirectionStationFrom" name="carSearch[forwardDirection][stationFrom]">
        <input type="hidden" id="carSearchForwardDirectionStationTo" name="carSearch[forwardDirection][stationTo]">
        <input type="hidden" id="carSearchForwardDirectionDepDate" name="carSearch[forwardDirection][depDate]">
        <input type="hidden" id="carSearchForwardDirectionDepTime" name="carSearch[forwardDirection][depTime]">
        <input type="hidden" id="carSearchForwardDirectionTrain" name="carSearch[forwardDirection][train]">
        <input type="hidden" id="carSearchForwardDirectionIsObligativeElReg" name="carSearch[forwardDirection][isObligativeElReg]">

        <input type="hidden" id="carSearchBackwardDirectionStationFrom" name="carSearch[backwardDirection][stationFrom]">
        <input type="hidden" id="carSearchBackwardDirectionStationTo" name="carSearch[backwardDirection][stationTo]">
        <input type="hidden" id="carSearchBackwardDirectionDepDate" name="carSearch[backwardDirection][depDate]">
        <input type="hidden" id="carSearchBackwardDirectionDepTime" name="carSearch[backwardDirection][depTime]">
        <input type="hidden" id="carSearchBackwardDirectionTrain" name="carSearch[backwardDirection][train]">
        <input type="hidden" id="carSearchBackwardDirectionIsObligativeElReg" name="carSearch[backwardDirection][isObligativeElReg]">
    </form>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="trainRoute" aria-labelledby="trainRouteLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ trans('trainRoute.title') }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="tranRouteBody">
        </div>
    </div>
		@php($endTime3 = microtime(true))
		@php($executionTime4 = $endTime3 - $startTime1)
		{{-- var_dump($executionTime4) --}}

@endsection


@section('pageScript')
    <script type="text/javascript">
		 $('.btn0').click(function() {
            $.ajax({
                url: 'searchResult/{id}',
                type: 'GET',
                data: { id: 0 },
                success: function(response)
                {
                }
            });
		});
    </script>
    <script type="text/javascript">
		 $('.btn1').click(function() {
            $.ajax({
                url: 'searchResult/{id}',
                type: 'GET',
                data: { id: 1 },
                success: function(response)
                {
                }
            });
		});
    </script>
    <script type="text/javascript">
		 $('.btn2').click(function() {
            $.ajax({
                url: 'searchResult/{id}',
                type: 'GET',
                data: { id: 2 },
                success: function(response)
                {
                }
            });
		});
    </script>
	    <script type="text/javascript">
		 $('.btn3').click(function() {
            $.ajax({
                url: 'searchResult/{id}',
                type: 'GET',
                data: { id: 3 },
                success: function(response)
                {
                }
            });
		});
    </script>
	    <script type="text/javascript">
		 $('.btn4').click(function() {
            $.ajax({
                url: 'searchResult/{id}',
                type: 'GET',
                data: { id: 4 },
                success: function(response)
                {
                }
            });
		});
    </script>
	    <script type="text/javascript">
		 $('.btn5').click(function() {
            $.ajax({
                url: 'searchResult/{id}',
                type: 'GET',
                data: { id: 5 },
                success: function(response)
                {
                }
            });
		});
    </script>
	    <script type="text/javascript">
		 $('.btn6').click(function() {
            $.ajax({
                url: 'searchResult/{id}',
                type: 'GET',
                data: { id: 6 },
                success: function(response)
                {
                }
            });
		});
    </script>
    {{--<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>--}}
    <script type="text/javascript">

        function switcher() {
            const departureInput = document.getElementById('departureStation');
            const arrivalInput = document.getElementById('arrivalStation');
            const departureCodeInput = document.getElementById('departureStationCode');
            const arrivalCodeInput = document.getElementById('arrivalStationCode');

            // Swap station names
            const tempStation = departureInput.value;
            departureInput.value = arrivalInput.value;
            arrivalInput.value = tempStation;

            // Swap station codes
            const tempCode = departureCodeInput.value;
            departureCodeInput.value = arrivalCodeInput.value;
            arrivalCodeInput.value = tempCode;

            event.preventDefault();
        }

        function isStringEmpty(string) {
            return !string.trim().length
        }
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var announcements = document.querySelectorAll('.announcement-item');

            announcements.forEach(function(announcement) {
                var announcementId = announcement.dataset.id;
                var closeButton = announcement.querySelector('.btn-close');

                closeButton.addEventListener('click', function() {
                    saveClosedAnnouncement(announcementId);

                });

                if (isAnnouncementClosed(announcementId)) {
                    announcement.style.display = 'none';
                }
            });

            function isAnnouncementClosed(announcementId) {
                var closedAnnouncements = JSON.parse(localStorage.getItem('closedAnnouncements')) || [];
                return closedAnnouncements.includes(announcementId);
            }

            function saveClosedAnnouncement(announcementId) {
                var closedAnnouncements = JSON.parse(localStorage.getItem('closedAnnouncements')) || [];
                closedAnnouncements.push(announcementId);
                localStorage.setItem('closedAnnouncements', JSON.stringify(closedAnnouncements));
            }

        });
    </script>



    <script type="text/javascript">



        let stations = JSON.parse(localStorage.getItem('stationList') || "[]");

        async function loadStations() {

            let stVersionResponse = await fetch('/railway/getStationsVersion');
            let stVersion = await stVersionResponse.json();

            let response = await fetch('/railway/getStationsCount');
            let stationsCount = await response.json();

            let response2 = await fetch('/stations/stati3');
            let stationsCount2 = await response2.json();
            let stationsCountAll = stationsCount + stationsCount2;

            if(stations !== null && Array.isArray(stations) && stations.length > 0 && (stVersion + '')  === localStorage.getItem("stationsVersion") && (stationsCountAll + '')  === localStorage.getItem("stationsCountAll")){
                return;
            }
            let loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));

            loadingModal.show();

            stations = [];

            let response1 = await fetch('/stations/station2');
            let stationMerge1 = await response1.json();
            stations = [...stations,  ...stationMerge1];

            //let response = await fetch('/railway/getStationsCount');
            //let stationsCount = await response.json();

            for (let i =0; i <= Math.floor(stationsCount/100); i++){
                let response = await fetch('/railway/getStations?page=' + i);
                let stationMerge = await response.json();

                stations = [...stations,  ...stationMerge];
            }

            localStorage.setItem("stationList", JSON.stringify(stations));
            localStorage.setItem("stationsVersion", stVersion);
            localStorage.setItem("stationsCountAll", stationsCountAll);

            loadingModal.hide();

            createAutocompletes();
        }

        loadStations();

    </script>


    <script type="text/javascript">

        function createAutocompletes(){
            $('#departureStation').autocomplete({
                source: stations,
                minLength: 2,
                select: function (event, ui) {

                    $('#departureStation').val(ui.item.value);
                    $('#departureStationCode').val(ui.item.id);
                }
            });

            $('#arrivalStation').autocomplete({
                source: stations,
                minLength: 2,
                select: function (event, ui) {

                    $('#arrivalStation').val(ui.item.value);
                    $('#arrivalStationCode').val(ui.item.id);
                }
            });
        }

        createAutocompletes();

    </script>

    <script type="text/javascript">
        $('#searchButton').click(function (e){
            var departureDate = $('#departureDate').datepicker('getDate');
            var backwardDate = $('#backwardDate').datepicker('getDate');

            if(departureDate != null && backwardDate != null && backwardDate < departureDate){
                e.preventDefault();

                alert("Обратная дата не может быть меньше даты отправления");
            }

		    var lfckv = document.getElementById("days3").checked;

			if (lfckv != false && backwardDate != null) {
			  alert("Поиск +-3 дней с обратной датой невозможен");
			  return false; // this prevents the form from submitting
			}

        });
    </script>

    <script type="text/javascript">
        jQuery.datepicker.regional.ru = {
            closeText: "Закрыть",
            prevText: "Пред",
            nextText: "След",
            currentText: "Сегодня",
            monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
            monthNamesShort: [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн",
                "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек" ],
            dayNames: [ "воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота" ],
            dayNamesShort: [ "вск", "пнд", "втр", "срд", "чтв", "птн", "сбт" ],
            dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
            weekHeader: "Нед",
            dateFormat: "dd.mm.yy",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: "" };
        jQuery.datepicker.setDefaults( jQuery.datepicker.regional.ru );


        $( "#departureDate, #backwardDate" ).datepicker({
            minDate: -0,
            maxDate: "+45D",
            numberOfMonths: 2,
            dateFormat:'dd-mm-yy'
        });
    </script>

	<script>
	/*$(function() {
		$( "form" ).submit(function() {
			$('#loader').show();
		});
	});*/
	</script>
    <script type="text/javascript">
        function search60() {
			var input1 = document.querySelector("input[name='departureStationCode']");
			var input2 = document.querySelector("input[name='arrivalStationCode']");

			if (input1.value=="" || input2.value=="") {
			  alert("Заполните станции отправки и прибытия пожалуйста");
			  return false; // this prevents the form from submitting
			}
				 window.location.href = "{{ url('railway/search60Result') }}" + "/" + input1.value+ "/" + input2.value;
			//}
        }
    </script>
    <style type="text/css" >
		#loader {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			width: 100%;
	        height:100%;
			background: rgba(0,0,0,0.75) url("/img/spinner.gif") no-repeat center center;
			z-index: 99999;
		}

        .autocomplete-suggestions { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
        .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
        .autocomplete-no-suggestion { padding: 2px 5px;}
        .autocomplete-selected { background: #F0F0F0; }
        .autocomplete-suggestions strong { font-weight: bold; color: #000; }
        .autocomplete-group { padding: 2px 5px; font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }

        .backward-direction{
            /*display: none;*/
        }

        #forwardToChoosePlacesButton{
            display: none;
        }

        .highlight-train{
            background-color: #E0E0E0;
        }

        .is_obligative_el_reg-train >td {
            background-color: #add8e6;
        }

        .announcement-item {
            width: 100%;
            margin-bottom: 5px;
        }

        #swap-btn {
            width: 26px;
            height: 26px;
            padding: 0;
            font-size: 14px;
        }

        #swap-btn {
            width: 40px;
            height: 40px;
            padding: 0;
            background: none;
            border: 1px solid black;
            cursor: pointer;
            margin-top: 30px;
            margin-left: 110px;
        }

        #swap-btn:hover {
            background-color: lightgray;
        }
    </style>

    {{--<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>--}}
    <script type="text/javascript">

        function sendEmail() {
            let emailModal = new bootstrap.Modal(document.getElementById('emailModal'));
            emailModal.show();
        }

        function closeModal() {
            $('#emailModal').modal('hide');
        }
        function isStringEmpty(string) {
            return !string.trim().length
        }
    </script>
    <script type="text/javascript">

        function sendEmail1() {
            let emailModal1 = new bootstrap.Modal(document.getElementById('emailModal1'));
            emailModal1.show();
        }

        function closeModal1() {
            $('#emailModal1').modal('hide');
        }
    </script>
    <script type="text/javascript">

        function sendEmail2() {
            let emailModal2 = new bootstrap.Modal(document.getElementById('emailModal2'));
            emailModal2.show();
        }

        function closeModal2() {
            $('#emailModal2').modal('hide');
        }
    </script>
    <script type="text/javascript">

        function sendEmail3() {
            let emailModal3 = new bootstrap.Modal(document.getElementById('emailModal3'));
            emailModal3.show();
        }

        function closeModal3() {
            $('#emailModal3').modal('hide');
        }
    </script>
    <script type="text/javascript">

        function sendEmail4() {
            let emailModal4 = new bootstrap.Modal(document.getElementById('emailModal4'));
            emailModal4.show();
        }

        function closeModal4() {
            $('#emailModal4').modal('hide');
        }
    </script>
    <script type="text/javascript">

        function sendEmail5() {
            let emailModal5 = new bootstrap.Modal(document.getElementById('emailModal5'));
            emailModal5.show();
        }

        function closeModal5() {
            $('#emailModal5').modal('hide');
        }
    </script>
    <script type="text/javascript">

        function sendEmail6() {
            let emailModal6 = new bootstrap.Modal(document.getElementById('emailModal6'));
            emailModal6.show();
        }

        function closeModal6() {
            $('#emailModal6').modal('hide');
        }
    </script>
    <script type="text/javascript">

        function sendEmail100() {
            let emailModal100 = new bootstrap.Modal(document.getElementById('emailModal100'));
            emailModal100.show();
        }

        function closeModal100() {
            $('#emailModal100').modal('hide');
        }
    </script>

    <script type="text/javascript">
        $('.choose_button').click(function (){
            let $this = $(this);
            let type = $this.data('type');
            $('#carSearch'+ type + 'DirectionStationFrom').val($this.data('station-from'));
            $('#carSearch'+ type + 'DirectionStationTo').val($this.data('station-to'));
            $('#carSearch'+ type + 'DirectionDepDate').val($this.data('dep-date'));
            $('#carSearch'+ type + 'DirectionTrain').val($this.data('train'));
            $('#carSearch'+ type + 'DirectionIsObligativeElReg').val($this.data('is_obligative_el_reg'));

            let $backwardDirection = $('.backward-direction');

            if(type === 'Forward' && $backwardDirection.length === 0){

                $('#carSearchForm').submit();
                //$('.forward-direction').hide();
                //$backwardDirection.show();
            }

            $('tr[data-type="' + type + '"]').removeClass('highlight-train');
            $this.parents('tr[data-type="' + type + '"]').addClass('highlight-train');

            if($('tr.highlight-train').length == 2){
                $('#forwardToChoosePlacesButton').show();
            }
        });

        $('#forwardToChoosePlacesButton').click(function (){
            $('#carSearchForm').submit();
        });
    </script>

    <script type="text/javascript">
        $('.train-route').click(function (){
            let $this = $(this);

            $.get('/railway/trainRoute', {
                train: $this.data('train'),
                date: $this.data('date'),
                station: $this.data('station'),
            }).done(function (html){
                $('#tranRouteBody').html(html)
            });
        });
    </script>

    <style type="text/css" >
        #trainRoute{
            width: 500px;
        }

        .backward-direction{
            /*display: none;*/
        }

        #forwardToChoosePlacesButton{
            display: none;
        }

        .highlight-train{
            background-color: #E0E0E0;
        }

        .is_obligative_el_reg-train >td {
            background-color: #add8e6;
        }

    </style>

@endsection
