@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <form name="buy_form_contract" method="get" action="/railway/buy" class="ui form">
        <input type="hidden" id="buy_form_contract_forwardDirection_car_type" name="buy_form_contract[forwardDirection][car][type]">
        <input type="hidden" id="buy_form_contract_forwardDirection_car_number" name="buy_form_contract[forwardDirection][car][number]">
        <input type="hidden" id="buy_form_contract_forwardDirection_car_service" name="buy_form_contract[forwardDirection][car][service]">
        <input type="hidden" id="buy_form_contract_forwardDirection_train" name="buy_form_contract[forwardDirection][train]">
        <input type="hidden" id="buy_form_contract_forwardDirection_isObligativeElReg" name="buy_form_contract[forwardDirection][isObligativeElReg]"
               value="{{$isObligativeElReg}}">
        <input type="hidden" id="buy_form_contract_forwardDirection_departureStation" name="buy_form_contract[forwardDirection][departureStation]"
               value="{{$stationFrom}}">
        <input type="hidden" id="buy_form_contract_forwardDirection_arrivalStation" name="buy_form_contract[forwardDirection][arrivalStation]"
               value="{{$stationTo}}">
        <input type="hidden" id="buy_form_contract_forwardDirection_upDownSlider" name="buy_form_contract[forwardDirection][upDownSlider]">
        <input type="hidden" id="buy_form_contract_forwardDirection_seatsComp" name="buy_form_contract[forwardDirection][seatsComp]">
        <input type="hidden" id="buy_form_contract_forwardDirection_departureDatetime" name="buy_form_contract[forwardDirection][departureDatetime]" style="display:none">
        <input type="hidden" id="buy_form_contract_forwardDirection_arrivalDatetime" name="buy_form_contract[forwardDirection][arrivalDatetime]" style="display:none">
        <input type="hidden" id="buy_form_contract_forwardDirection_withoutBedding" name="buy_form_contract[forwardDirection][withoutBedding]">
        <input type="hidden" id="buy_form_contract_forwardDirection_timeInWay" name="buy_form_contract[forwardDirection][timeInWay]">
        <input type="hidden" id="buy_form_contract_forwardDirection_addSigns" name="buy_form_contract[forwardDirection][addSigns]">

        <input type="hidden" id="buy_form_contract_backwardDirection_car_type" name="buy_form_contract[backwardDirection][car][type]">
        <input type="hidden" id="buy_form_contract_backwardDirection_car_number" name="buy_form_contract[backwardDirection][car][number]">
        <input type="hidden" id="buy_form_contract_backwardDirection_car_service" name="buy_form_contract[backwardDirection][car][service]">
        <input type="hidden" id="buy_form_contract_backwardDirection_train" name="buy_form_contract[backwardDirection][train]">
        <input type="hidden" id="buy_form_contract_backwardDirection_isObligativeElReg" name="buy_form_contract[backwardDirection][isObligativeElReg]"
               value="{{$isObligativeElReg}}">
        <input type="hidden" id="buy_form_contract_backwardDirection_departureStation" name="buy_form_contract[backwardDirection][departureStation]" style="display:none"
               value="{{$stationTo}}">
        <input type="hidden" id="buy_form_contract_backwardDirection_arrivalStation" name="buy_form_contract[backwardDirection][arrivalStation]" style="display:none"
               value="{{$stationFrom}}">
        <input type="hidden" id="buy_form_contract_backwardDirection_upDownSlider" name="buy_form_contract[backwardDirection][upDownSlider]" style="display:none">
        <input type="hidden" id="buy_form_contract_backwardDirection_seatsComp" name="buy_form_contract[backwardDirection][seatsComp]" style="display:none">
        <input type="hidden" id="buy_form_contract_backwardDirection_departureDatetime" name="buy_form_contract[backwardDirection][departureDatetime]" style="display:none">
        <input type="hidden" id="buy_form_contract_backwardDirection_arrivalDatetime" name="buy_form_contract[backwardDirection][arrivalDatetime]" style="display:none">
        <input type="hidden" id="buy_form_contract_backwardDirection_withoutBedding" name="buy_form_contract[backwardDirection][withoutBedding]">
        <input type="hidden" id="buy_form_contract_backwardDirection_timeInWay" name="buy_form_contract[backwardDirection][timeInWay]">
        <input type="hidden" id="buy_form_contract_backwardDirection_addSigns" name="buy_form_contract[backwardDirection][addSigns]">

    </form>
    @foreach($ktjResponse->getForwardDirectionDto()->getTrains() as $trainCollection)
        <div class="forward-direction">
            <h1>{{ trans('carSearch.forward direction') }}</h1>
            <div class="route-name">
                {{ $viewUtils->getStationNameByCode($stationFrom) }} --> {{ $viewUtils->getStationNameByCode($stationTo) }}
                {{$viewUtils->formatDate($forwardDepDate)}}
                <a class="btn btn-default change-search-button" href="{{route('searchTrain')}}">{{ trans('carSearch.change search') }}</a>
            </div>
            @include('railway.train.carSearch.train', ['train'=>$trainCollection->getTrain(), 'direction'=>'forward', 'isObligativeElReg'=>$isObligativeElReg])
        </div>
    @endforeach

    @if($ktjResponse->getBackwardDirectionDto() != null && count($ktjResponse->getBackwardDirectionDto()->getTrains()) > 0)
        @foreach($ktjResponse->getBackwardDirectionDto()->getTrains() as $trainCollection)
            <div class="backward-direction">
                <h1>{{ trans('carSearch.backward direction') }}</h1>
                <div class="route-name">
                    {{ $viewUtils->getStationNameByCode($stationTo) }} --> {{ $viewUtils->getStationNameByCode($stationFrom) }}
                    {{$viewUtils->formatDate($forwardDepDate)}}
                    <a class="btn btn-default change-search-button" href="{{route('searchTrain')}}">{{ trans('carSearch.change search') }}</a>
                </div>
                @include('railway.train.carSearch.train', ['train'=>$trainCollection->getTrain(), 'direction'=>'backward', 'isObligativeElReg'=>$isObligativeElReg])
            </div>
        @endforeach
    @endif
@endsection


@section('pageScript')
    <style type="text/css">
        .carHelper {
            margin-bottom: .5em
        }

        .carHelper .help {
            line-height: 20px;
            display: inline-block;
            margin-right: 20px
        }

        .carHelper .help:before {
            content: " ";
            width: 20px;
            height: 20px;
            line-height: 20px;
            display: inline-block;
            text-align: center;
            margin-right: 10px
        }

        .carHelper .help.available:before {
            background: #009afd;
            content: "1";
            color: #fff
        }

        .carHelper .help.selected:before {
            background: #22be34;
            content: "2";
            color: #fff
        }

        .carHelper .help.notAvailable:before {
            background: #f55;
            content: "3";
            color: #fff
        }

        .carHelper .help.range:before {
            background: repeating-linear-gradient(45deg,#f7b32e,#ccc 2px,#c38e29 4px,#ccc 6px);
            content: "4";
            color: #fff
        }



        .ui.checkbox.seat {
            width: 30px;
            height: 25px;
            display: block;
            background: #00aeef;
            border: 1px solid #fff;
            float: left;
            line-height: 12.5px;
            margin: 1px
        }

        .ui.checkbox.seat.vl {
            position: absolute
        }

        .ui.checkbox.seat.vl:nth-child(n+2) {
            top: 25px;
            left: 0
        }

        .ui.checkbox.seat.vl:nth-child(n+3) {
            top: 50px;
            left: 0
        }

        .ui.checkbox.seat.vl:nth-child(n+4) {
            top: 75px;
            left: 0
        }

        .ui.checkbox.seat.vl:nth-child(n+5) {
            top: 0;
            left: 30px
        }

        .ui.checkbox.seat.vl:nth-child(n+6) {
            top: 25px;
            left: 30px
        }

        .ui.checkbox.seat.vl:nth-child(n+7) {
            top: 50px;
            left: 30px
        }

        .ui.checkbox.seat.vl:nth-child(n+8) {
            top: 75px;
            left: 30px
        }

        .ui.checkbox.seat.vl:nth-child(n+9) {
            top: 0;
            left: 60px
        }

        .ui.checkbox.seat.vl:nth-child(n+10) {
            top: 25px;
            left: 60px
        }

        .ui.checkbox.seat.vl:nth-child(n+11) {
            top: 50px;
            left: 60px
        }

        .ui.checkbox.seat.vl:nth-child(n+12) {
            top: 75px;
            left: 60px
        }

        .ui.checkbox.seat.vl:nth-child(n+13) {
            top: 0;
            left: 90px
        }

        .ui.checkbox.seat.vl:nth-child(n+14) {
            top: 25px;
            left: 90px
        }

        .ui.checkbox.seat.vl:nth-child(n+15) {
            top: 50px;
            left: 90px
        }

        .ui.checkbox.seat.vl:nth-child(n+16) {
            top: 75px;
            left: 90px
        }

        .ui.checkbox.seat.vl:nth-child(n+17) {
            top: 0;
            left: 120px
        }

        .ui.checkbox.seat.vl:nth-child(n+18) {
            top: 25px;
            left: 120px
        }

        .ui.checkbox.seat.vl:nth-child(n+19) {
            top: 50px;
            left: 120px
        }

        .ui.checkbox.seat.vl:nth-child(n+20) {
            top: 75px;
            left: 120px
        }

        .ui.checkbox.seat.vl:nth-child(n+21) {
            top: 0;
            left: 150px
        }

        .ui.checkbox.seat.vl:nth-child(n+22) {
            top: 25px;
            left: 150px
        }

        .ui.checkbox.seat.vl:nth-child(n+23) {
            top: 50px;
            left: 150px
        }

        .ui.checkbox.seat.vl:nth-child(n+24) {
            top: 75px;
            left: 150px
        }

        .ui.checkbox.seat.vl:nth-child(n+25) {
            top: 0;
            left: 180px
        }

        .ui.checkbox.seat.vl:nth-child(n+26) {
            top: 25px;
            left: 180px
        }

        .ui.checkbox.seat.vl:nth-child(n+27) {
            top: 50px;
            left: 180px
        }

        .ui.checkbox.seat.vl:nth-child(n+28) {
            top: 75px;
            left: 180px
        }

        .ui.checkbox.seat.vl:nth-child(n+29) {
            top: 0;
            left: 210px
        }

        .ui.checkbox.seat.vl:nth-child(n+30) {
            top: 25px;
            left: 210px
        }

        .ui.checkbox.seat.vl:nth-child(n+31) {
            top: 50px;
            left: 210px
        }

        .ui.checkbox.seat.vl:nth-child(n+32) {
            top: 75px;
            left: 210px
        }

        .ui.checkbox.seat.vl:nth-child(n+33) {
            top: 0;
            left: 240px
        }

        .ui.checkbox.seat.vl:nth-child(n+34) {
            top: 25px;
            left: 240px
        }

        .ui.checkbox.seat.vl:nth-child(n+35) {
            top: 50px;
            left: 240px
        }

        .ui.checkbox.seat.vl:nth-child(n+36) {
            top: 75px;
            left: 240px
        }

        .ui.checkbox.seat.vl:nth-child(n+37) {
            top: 0;
            left: 270px
        }

        .ui.checkbox.seat.vl:nth-child(n+38) {
            top: 25px;
            left: 270px
        }

        .ui.checkbox.seat.vl:nth-child(n+39) {
            top: 50px;
            left: 270px
        }

        .ui.checkbox.seat.vl:nth-child(n+40) {
            top: 75px;
            left: 270px
        }

        .ui.checkbox.seat.vl:nth-child(n+41) {
            top: 0;
            left: 300px
        }

        .ui.checkbox.seat.vl:nth-child(n+42) {
            top: 25px;
            left: 300px
        }

        .ui.checkbox.seat.vl:nth-child(n+43) {
            top: 50px;
            left: 300px
        }

        .ui.checkbox.seat.vl:nth-child(n+44) {
            top: 75px;
            left: 300px
        }

        .ui.checkbox.seat.vl:nth-child(n+45) {
            top: 0;
            left: 330px
        }

        .ui.checkbox.seat.vl:nth-child(n+46) {
            top: 25px;
            left: 330px
        }

        .ui.checkbox.seat.vl:nth-child(n+47) {
            top: 50px;
            left: 330px
        }

        .ui.checkbox.seat.vl:nth-child(n+48) {
            top: 75px;
            left: 330px
        }

        .ui.checkbox.seat.vl:nth-child(n+49) {
            top: 0;
            left: 360px
        }

        .ui.checkbox.seat.vl:nth-child(n+50) {
            top: 25px;
            left: 360px
        }

        .ui.checkbox.seat.vl:nth-child(n+51) {
            top: 50px;
            left: 360px
        }

        .ui.checkbox.seat.vl:nth-child(n+52) {
            top: 75px;
            left: 360px
        }

        .ui.checkbox.seat.vl:nth-child(n+53) {
            top: 0;
            left: 390px
        }

        .ui.checkbox.seat.vl:nth-child(n+54) {
            top: 25px;
            left: 390px
        }

        .ui.checkbox.seat.vl:nth-child(n+55) {
            top: 50px;
            left: 390px
        }

        .ui.checkbox.seat.vl:nth-child(n+56) {
            top: 75px;
            left: 390px
        }

        .ui.checkbox.seat.vl:nth-child(n+57) {
            top: 0;
            left: 420px
        }

        .ui.checkbox.seat.vl:nth-child(n+58) {
            top: 25px;
            left: 420px
        }

        .ui.checkbox.seat.vl:nth-child(n+59) {
            top: 50px;
            left: 420px
        }

        .ui.checkbox.seat.vl:nth-child(n+60) {
            top: 75px;
            left: 420px
        }

        .ui.checkbox.seat.vl:nth-child(n+61) {
            top: 0;
            left: 450px
        }

        .ui.checkbox.seat.vl:nth-child(n+62) {
            top: 25px;
            left: 450px
        }

        .ui.checkbox.seat.vl:nth-child(n+63) {
            top: 50px;
            left: 450px
        }

        .ui.checkbox.seat.vl:nth-child(n+64) {
            top: 75px;
            left: 450px
        }

        .ui.checkbox.seat.vl:nth-child(n+65) {
            top: 0;
            left: 480px
        }

        .ui.checkbox.seat.vl:nth-child(n+66) {
            top: 25px;
            left: 480px
        }

        .ui.checkbox.seat.vl:nth-child(n+67) {
            top: 50px;
            left: 480px
        }

        .ui.checkbox.seat.vl:nth-child(n+68) {
            top: 75px;
            left: 480px
        }

        .ui.checkbox.seat.vl:nth-child(n+69) {
            top: 0;
            left: 510px
        }

        .ui.checkbox.seat.vl:nth-child(n+70) {
            top: 25px;
            left: 510px
        }

        .ui.checkbox.seat.vl:nth-child(n+71) {
            top: 50px;
            left: 510px
        }

        .ui.checkbox.seat.vl:nth-child(n+72) {
            top: 75px;
            left: 510px
        }

        .ui.checkbox.seat.vl:nth-child(n+73) {
            top: 0;
            left: 540px
        }

        .ui.checkbox.seat.vl:nth-child(n+74) {
            top: 25px;
            left: 540px
        }

        .ui.checkbox.seat.vl:nth-child(n+75) {
            top: 50px;
            left: 540px
        }

        .ui.checkbox.seat.vl:nth-child(n+76) {
            top: 75px;
            left: 540px
        }

        .ui.checkbox.seat.vl:nth-child(n+77) {
            top: 0;
            left: 570px
        }

        .ui.checkbox.seat.vl:nth-child(n+78) {
            top: 25px;
            left: 570px
        }

        .ui.checkbox.seat.vl:nth-child(n+79) {
            top: 50px;
            left: 570px
        }

        .ui.checkbox.seat.vl:nth-child(n+80) {
            top: 75px;
            left: 570px
        }

        .ui.checkbox.seat.vl:nth-child(n+81) {
            top: 0;
            left: 600px
        }

        .ui.checkbox.seat.vl:nth-child(n+82) {
            top: 25px;
            left: 600px
        }

        .ui.checkbox.seat.vl:nth-child(n+83) {
            top: 50px;
            left: 600px
        }

        .ui.checkbox.seat.vl:nth-child(n+84) {
            top: 75px;
            left: 600px
        }

        .ui.checkbox.seat.vl:nth-child(n+85) {
            top: 0;
            left: 630px
        }

        .ui.checkbox.seat.vl:nth-child(n+86) {
            top: 25px;
            left: 630px
        }

        .ui.checkbox.seat.vl:nth-child(n+87) {
            top: 50px;
            left: 630px
        }

        .ui.checkbox.seat.vl:nth-child(n+88) {
            top: 75px;
            left: 630px
        }

        .ui.checkbox.seat.vl:nth-child(n+89) {
            top: 0;
            left: 660px
        }

        .ui.checkbox.seat.vl:nth-child(n+90) {
            top: 25px;
            left: 660px
        }

        .ui.checkbox.seat.vl:nth-child(n+91) {
            top: 50px;
            left: 660px
        }

        .ui.checkbox.seat.vl:nth-child(n+92) {
            top: 75px;
            left: 660px
        }

        .ui.checkbox.seat.vl:nth-child(n+93) {
            top: 0;
            left: 690px
        }

        .ui.checkbox.seat.vl:nth-child(n+94) {
            top: 25px;
            left: 690px
        }

        .ui.checkbox.seat.vl:nth-child(n+95) {
            top: 50px;
            left: 690px
        }

        .ui.checkbox.seat.vl:nth-child(n+96) {
            top: 75px;
            left: 690px
        }

        .ui.checkbox.seat.vl:nth-child(n+97) {
            top: 0;
            left: 720px
        }

        .ui.checkbox.seat.vl:nth-child(n+98) {
            top: 25px;
            left: 720px
        }

        .ui.checkbox.seat.vl:nth-child(n+99) {
            top: 50px;
            left: 720px
        }

        .ui.checkbox.seat.vl:nth-child(n+100) {
            top: 75px;
            left: 720px
        }

        .ui.checkbox.seat.vl:nth-child(n+101) {
            top: 0;
            left: 750px
        }

        .ui.checkbox.seat.vl:nth-child(n+102) {
            top: 25px;
            left: 750px
        }

        .ui.checkbox.seat.vl:nth-child(n+103) {
            top: 50px;
            left: 750px
        }

        .ui.checkbox.seat.vl:nth-child(n+104) {
            top: 75px;
            left: 750px
        }

        .ui.checkbox.seat.vl:nth-child(n+105) {
            top: 0;
            left: 780px
        }

        .ui.checkbox.seat.vl:nth-child(n+106) {
            top: 25px;
            left: 780px
        }

        .ui.checkbox.seat.vl:nth-child(n+107) {
            top: 50px;
            left: 780px
        }

        .ui.checkbox.seat.vl:nth-child(n+108) {
            top: 75px;
            left: 780px
        }

        .ui.checkbox.seat.vl:nth-child(n+109) {
            top: 0;
            left: 810px
        }

        .ui.checkbox.seat.vl:nth-child(n+110) {
            top: 25px;
            left: 810px
        }

        .ui.checkbox.seat.vl:nth-child(n+111) {
            top: 50px;
            left: 810px
        }

        .ui.checkbox.seat.vl:nth-child(n+112) {
            top: 75px;
            left: 810px
        }

        .ui.checkbox.seat.vl:nth-child(n+113) {
            top: 0;
            left: 840px
        }

        .ui.checkbox.seat.vl:nth-child(n+114) {
            top: 25px;
            left: 840px
        }

        .ui.checkbox.seat.vl:nth-child(n+115) {
            top: 50px;
            left: 840px
        }

        .ui.checkbox.seat.vl:nth-child(n+116) {
            top: 75px;
            left: 840px
        }

        .ui.checkbox.seat.vl:nth-child(n+117) {
            top: 0;
            left: 870px
        }

        .ui.checkbox.seat.vl:nth-child(n+118) {
            top: 25px;
            left: 870px
        }

        .ui.checkbox.seat.vl:nth-child(n+119) {
            top: 50px;
            left: 870px
        }

        .ui.checkbox.seat.vl:nth-child(n+120) {
            top: 75px;
            left: 870px
        }

        .ui.checkbox.seat.vl:nth-child(n+121) {
            top: 0;
            left: 900px
        }

        .ui.checkbox.seat.vl:nth-child(n+122) {
            top: 25px;
            left: 900px
        }

        .ui.checkbox.seat.vl:nth-child(n+123) {
            top: 50px;
            left: 900px
        }

        .ui.checkbox.seat.vl:nth-child(n+124) {
            top: 75px;
            left: 900px
        }

        .ui.checkbox.seat.vl:nth-child(n+125) {
            top: 0;
            left: 930px
        }

        .ui.checkbox.seat.vl:nth-child(n+126) {
            top: 25px;
            left: 930px
        }

        .ui.checkbox.seat.vl:nth-child(n+127) {
            top: 50px;
            left: 930px
        }

        .seat.ui.checkbox input[type=checkbox] {
            width: 30px;
            height: 25px
        }

        .seat.ui.checkbox+label,.seat.ui.checkbox label,.seat.ui.checkbox label:active,.seat.ui.checkbox label:hover {
            left: 0;
            top: 0;
            position: absolute;
            padding: 5px;
            margin: 0;
            width: 30px;
            height: 30px;
            color: #fff!important;
            font-size: 11px
        }

        .seat.ui.checkbox input:checked~label:after,.seat.ui.checkbox label:before {
            display: none
        }

        .seat.ui.checkbox.checked {
            background-color: #21ba45;
            color: #fff
        }

        .seat.ui.checkbox.between:not(.checked) {
            background: repeating-linear-gradient(45deg,#f7b32e,#ccc 2px,#c38e29 4px,#ccc 6px);
            color: #fff
        }

        .seat.ui.checkbox.blocked:not(.checked) {
            background-color: #ccc!important
        }

        .seat.ui.checkbox.checked label {
            color: #fff
        }

        .seat.ui.reserved.checkbox .box:after,.seat.ui.reserved.checkbox label {
            color: #fff!important;
            background: #f55!important;
            opacity: 1;
            height: 23px;
            width: 28px
        }

        .seat.ui.checkbox.bl {
            bottom: 0;
            left: 0;
            position: absolute;
            box-shadow: none
        }

        .seat.ui.checkbox.ml {
            top: 27px;
            left: 0;
            position: absolute;
            box-shadow: none
        }

        .seat.ui.checkbox.tl {
            top: 0;
            left: 0;
            position: absolute;
            box-shadow: none
        }

        .seat.ui.checkbox.bm {
            bottom: 0
        }

        .seat.ui.checkbox.bm,.seat.ui.checkbox.mm {
            left: 32px;
            position: absolute;
            box-shadow: none
        }

        .seat.ui.checkbox.mm {
            top: 27px
        }

        .seat.ui.checkbox.tm {
            top: 0;
            left: 32px;
            position: absolute;
            box-shadow: none
        }

        .seat.ui.checkbox.br {
            bottom: 0;
            right: 0;
            position: absolute;
            box-shadow: none
        }

        .seat.ui.checkbox.mr {
            bottom: 27px;
            right: 0;
            position: absolute;
            box-shadow: none
        }

        .seat.ui.checkbox.tr {
            top: 0;
            right: 0;
            position: absolute;
            box-shadow: none
        }

        .cabin {
            position: relative;
            float: left;
            display: inline;
            border: 1px solid #dededf;
            border-top: none;
            width: 93px;
            height: 78px
        }

        .cabin:before {
            content: "";
            position: absolute;
            left: 35px;
            bottom: -1px;
            height: 3px;
            width: 29px;
            border-bottom: 1px solid #fff
        }

        .cabin+.cabin {
            border-left: none
        }

        .half-cabins {
            margin-top: 15px
        }

        .cabins {
            height: 78px
        }

        .half-cabin {
            position: relative;
            float: right;
            display: inline;
            border: 1px solid #dededf;
            width: 93px;
            height: 27px;
            clear: left
        }

        .carriage>.half-cabin~.half-cabin {
            clear: none
        }

        .half-cabin:before {
            content: "";
            position: absolute;
            left: 35px;
            top: -2px;
            height: 3px;
            width: 29px;
            border-bottom: 2px solid #fff
        }

        .carriage {
            width: 1100px;
            margin: 0 auto;
            position: relative;
            border: 1px solid #dededf;
            height: 145px;
            background: #fff
        }

        .carriage .front {
            width: 130.5px;
            float: left;
            height: 100%
        }

        .talgo.carriage .front {
            background: url(/assets/default/images/talgo-front.9d52fee1.png);
            background-size: cover
        }

        .talgo.carriage .back {
            background: url(/assets/default/images/talgo-back.143b13a9.png);
            background-size: cover
        }

        .talgo.carriage .front .toilet {
            position: relative;
            float: right;
            display: inline;
            border: none;
            color: #00aeef
        }

        .talgo.carriage .front .toilet .icon {
            top: 12px;
            left: 0;
            color: #00aeef;
            position: absolute
        }

        .carriage .front .tambur {
            background: #f8f8f9;
            height: 100%;
            float: left;
            width: 43.5px
        }

        .carriage .front .toilet {
            position: relative;
            float: left;
            display: inline;
            border: 1px solid #dededf;
            border-top: none;
            width: 43.5px;
            height: 78px;
            color: #00aeef
        }

        .carriage .conductor .icon,.carriage .tambur .icon,.carriage .toilet .icon {
            top: 23px;
            left: 6px;
            color: #00aeef;
            position: absolute
        }

        .carriage .front .conductor {
            position: relative;
            float: left;
            display: inline;
            border: 1px solid #dededf;
            border-top: none;
            width: 43.5px;
            height: 78px
        }

        .carriage .content {
            padding: 0!important;
            margin: 0!important;
            float: left;
            position: relative
        }

        .carriage .back {
            width: 130.5px;
            float: left;
            height: 100%
        }

        .carriage .back .tambur {
            background: #f8f8f9;
            height: 100%;
            float: left;
            width: 87px
        }

        .carriage .back .toilet {
            position: relative;
            float: left;
            display: inline;
            border: 1px solid #dededf;
            border-top: none;
            width: 43.5px;
            height: 78px
        }

        .toilet>svg {
            font-size: 2em;
            left: 3px!important
        }

        .additional-seats-container {
            margin-top: 10px
        }

        .additional-seats-container .additional-seats {
            border: 1px solid #ddd;
            position: relative;
            height: 60px;
            background-color: #fff
        }

        .additional-seats-container .additional-seats .seat.ui.checkbox.tl {
            position: relative
        }

        .train .train-header {
            color: #1c5698;
            font-size: 15px;
            display: block
        }

        .train .train-content {
            color: #1c5698;
            font-size: 14px;
            display: block
        }

        .choose-train,.train .train-information:active,.train .train-information:focus,.train .train-information:hover,.train .train-route:active,.train .train-route:focus,.train .train-route:hover {
            cursor: pointer
        }

        .ui.table.train .train-header-row .train-content-for-mobile {
            display: none
        }

        .train-modal-carrier-name {
            font-size: 15px;
            font-weight: 700
        }

        .train-modal-carrier-type {
            font-size: 14px;
            color: #3f48cc
        }

        .carItem{
            display: none;
        }

        .carItem.active{
            display: table-row;
        }

        .carItemTitleRow{
            cursor: pointer;
        }


        .talgo_2c_area{
            float: left;
            clear: both;
        }

        .talgo_2c_area_bottom, .talgo_2c_area_half{
            display: block;
            margin-top: 20px;

            float: left;
            clear: both;
        }
        .talgo_2c_area_row{
            position: relative;
            float: left;
            display: inline;
            border-top: none;
            width: 30px;
            height: 49px;
        }

        .talgo_2c_area_row_half{
            position: relative;
            float: left;
            display: inline;
            border-top: none;
            width: 30px;
            height: 29px;
        }

        .talgo_2c_area_chair{
            width: 50px;
            height: 30px;
            background-color: #00669e;
            float: left;
            margin: 10px;
        }

        .female-carriage >th {
            background-color: #faeded;
        }

        span.car-el-reg {
            border-radius: 3px;
            width: auto;
            height: auto;
            line-height: 13px;
            color: #55a829;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid #55a829;
            font-style: normal;
            padding: 0 3px;
        }

        @media only screen and (max-width: 767px) {
            .train td,.ui.table.train th {
                background:none;
                border: none!important;
                display: block;
                width: 100%
            }

            .ui.table.train th {
                text-align: center
            }

            .ui.table.train .train-header-row td {
                border-top: 1px solid rgba(34,36,38,.15)!important;
                padding: 1em
            }

            .ui.table.train .train-header-row td:first-child {
                border-top: none
            }

            .ui.table.train .train-header-row td .button {
                float: none
            }

            .ui.table.train .train-header-row .train-header {
                display: inline-block;
                width: 49%;
                vertical-align: middle
            }

            .ui.table.train .train-header-row .train-content-for-mobile {
                display: inline-block;
                text-align: right;
                width: 49%;
                vertical-align: middle
            }

            .ui.table.train .train-content-row {
                display: none!important
            }
        }

        .ui.checkbox input.hidden {
            z-index: -1;
        }

        .ui.checkbox {
            position: relative;
            display: inline-block;
            backface-visibility: hidden;
            outline: none;
            vertical-align: baseline;
            font-style: normal;
            min-height: 17px;
            font-size: 1rem;
            line-height: 17px;
            min-width: 17px
        }

        .ui.checkbox input[type=checkbox],.ui.checkbox input[type=radio] {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0!important;
            outline: none;
            z-index: 3;
            width: 17px;
            height: 17px
        }

    </style>

    <style type="text/css">
        .route-name{
            margin: 20px 0;
            padding: 0 10px;
            background-color: #f0f0f0;
            width: 50%;
        }

        .change-search-button{
            color: blue;
            text-decoration: underline;
        }

        .backward-direction{
            display: none;
        }
    </style>

    <script type="text/javascript">

        $('.carItemTitleRow').click(function (){
            $('.carItem').removeClass('active');
            $(this).next('.carItem').addClass('active');
        });


        $('.places').click(function (e){

            let $this = $(this);
            let number = parseInt($this.val());
            let $carItem = $(this).closest('.carItem');
            let seatsString = $carItem.data('seats');

            let seatsArray = [];

            if(typeof seatsString != 'undefined'){

                seatsArray = seatsString.split(',');
            }

            if(seatsArray.length == 4 && $this.prop('checked') == true){
                e.preventDefault();

                return;
            }

            if($this.prop('checked') == true){
                $this.parents('div.seat').addClass('checked');
                seatsArray.push(number);
            }else{
                $this.parents('div.seat').removeClass('checked');
                let index = seatsArray.indexOf(number);

                seatsArray.splice(index, 1);
            }
            seatsArray = seatsArray.sort();
            seatsString = seatsArray.toString();
            $carItem.data('seats', seatsString);
            $('.selected-seats .result', $carItem).text(seatsString);
        });

        $('.make-reservation').click(function (){
            let $this = $(this);
        });


        $(document).on('click', '.make-reservation', function () {
            let appendSeats = function (carItem, formSelector, formName, direction){
                let seatsString = $carItem.data('seats');
                let seatsArray = [];
                if(typeof seatsString != 'undefined'){

                    seatsArray = seatsString.split(',');
                    for(let i in seatsArray){
                        $(formSelector).append('<input type="hidden" name="'+ formName +'[' + direction + '][seats][]" value="' + seatsArray[i] + '"/>');
                    }
                }
            }



            let $carItem = $(this).closest('.carItem');
            let $direction = $carItem.data('direction');
            let $formSelector = "form[name='buy_form_contract']";
            if ($direction === 'forward') {
                $('#buy_form_contract_forwardDirection_train').val($carItem.data('train-number'));
                $('#buy_form_contract_forwardDirection_car_type').val($carItem.data('car-type'));
                $('#buy_form_contract_forwardDirection_car_number').val($carItem.data('car-number'));
                $('#buy_form_contract_forwardDirection_car_service').val($carItem.data('car-service'));
                $('#buy_form_contract_forwardDirection_departureDatetime').val($carItem.data('departure-datetime'));
                $('#buy_form_contract_forwardDirection_arrivalDatetime').val($carItem.data('arrival-datetime'));
                $('#buy_form_contract_forwardDirection_timeInWay').val($carItem.data('time-in-way'));
                $('#buy_form_contract_forwardDirection_addSigns').val($carItem.data('add-signs'));

                appendSeats($carItem, $formSelector, 'buy_form_contract', 'forwardDirection');

                if ($('.backward-direction').length > 0) {

                    $('.forward-direction').hide();
                    $('.backward-direction').show();
                } else {
                    $($formSelector).submit();
                }
            } else if ($direction === 'backward') {
                $('#buy_form_contract_backwardDirection_train').val($carItem.data('train-number'));
                $('#buy_form_contract_backwardDirection_car_type').val($carItem.data('car-type'));
                $('#buy_form_contract_backwardDirection_car_number').val($carItem.data('car-number'));
                $('#buy_form_contract_backwardDirection_car_service').val($carItem.data('car-service'));
                $('#buy_form_contract_backwardDirection_departureDatetime').val($carItem.data('departure-datetime'));
                $('#buy_form_contract_backwardDirection_arrivalDatetime').val($carItem.data('arrival-datetime'));
                $('#buy_form_contract_backwardDirection_timeInWay').val($carItem.data('time-in-way'));
                $('#buy_form_contract_backwardDirection_addSigns').val($carItem.data('add-signs'));

                appendSeats($carItem, $formSelector, 'buy_form_contract', 'backwardDirection');

                $($formSelector).submit();
            }
        });

        /*$(document).on('click', '.make-reservation', function () {
            let $carItem = $(this).closest('.carItem');
            let $direction = $carItem.data('direction');
            let $formSelector = "form[name='buy_form_contract']";
            if ($direction === 'forward') {
                $('#buy_form_contract_forwardDirection_train').val($carItem.data('train-number'));
                $('#buy_form_contract_forwardDirection_car_type').val($carItem.data('car-type'));
                $('#buy_form_contract_forwardDirection_car_number').val($carItem.data('car-number'));
                $('#buy_form_contract_forwardDirection_car_service').val($carItem.data('car-service'));
                $('#buy_form_contract_forwardDirection_departureDatetime').val($carItem.data('departure-datetime'));
                $('#buy_form_contract_forwardDirection_arrivalDatetime').val($carItem.data('arrival-datetime'));
                $('#buy_form_contract_forwardDirection_timeInWay').val($carItem.data('time-in-way'));
                $('#buy_form_contract_forwardDirection_addSigns').val($carItem.data('add-signs'));

                if ($('#backward-direction-trains .carItem').length > 0) {
                    Seat.getInstance().clearPlaces();
                    $('#forward-direction-trains').fadeOut();
                    $('#backward-direction-trains').fadeIn();
                } else {
                    $($formSelector).submit();
                }
            } else if ($direction === 'backward') {
                $('#buy_form_contract_backwardDirection_train').val($carItem.data('train-number'));
                $('#buy_form_contract_backwardDirection_car_type').val($carItem.data('car-type'));
                $('#buy_form_contract_backwardDirection_car_number').val($carItem.data('car-number'));
                $('#buy_form_contract_backwardDirection_car_service').val($carItem.data('car-service'));
                $('#buy_form_contract_backwardDirection_departureDatetime').val($carItem.data('departure-datetime'));
                $('#buy_form_contract_backwardDirection_arrivalDatetime').val($carItem.data('arrival-datetime'));
                $('#buy_form_contract_backwardDirection_timeInWay').val($carItem.data('time-in-way'));
                $('#buy_form_contract_backwardDirection_addSigns').val($carItem.data('add-signs'));

                $($formSelector).submit();
            }
        });*/
    </script>
@endsection
