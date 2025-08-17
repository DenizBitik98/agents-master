@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@php($compiled = view('railway.buy.blankForm')->with('index', '###index###')
            ->with('docTypes', $docTypes)
            ->with('sexList', $sexList)
            ->with('countries', $countries)
            ->with('isObligativeElReg', $isObligativeElReg)
            ->render())
@section('content')
    <form method="post" action="{{route('railwaysBuy')}}">
        @csrf

        <div class="row">
            <div class="col-lg-{{ $buyForm->getBackwardDirection() != null ? '6' : '12' }}">
                <h1>{{ trans('carSearch.forward direction') }}</h1>
                <div></div>
                @include('railway.buy.direction', ['directionData'=>$buyForm->getForwardDirection(), 'direction'=>'forwardDirection'])
            </div>

            @if($buyForm->getBackwardDirection() != null)
                <div class="col-lg-6">
                    <h1>{{ trans('carSearch.backward direction') }}</h1>
                    <div></div>
                    @include('railway.buy.direction', ['directionData'=>$buyForm->getBackwardDirection(), 'direction'=>'backwardDirection'])
                </div>
            @endif
        </div>


        <div class="col-lg-12" id="blanksList">
            <h1>{{ trans('buy.passenger data') }}</h1>


            @foreach($buyForm->getBlanks() as $k=>$blank)
                @include('railway.buy.blankForm', ['index'=>$k, 'docTypes'=>$docTypes, 'sexList'=>$sexList, 'countries'=>$countries, 'isObligativeElReg'=>$isObligativeElReg])
            @endforeach

        </div>

        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-success" id="addPassenger"
                        data-blank-prototype="{{$compiled}}"

                >
                    <i class="fas fa-plus"></i>
                    {{ trans('buy.passenger add') }}
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-success buy-button">
                    <i class="fas fa-train"></i>
                    {{ trans('buy.buy') }}
                </button>
            </div>
        </div>
    </form>
@endsection


@section('pageScript')
    <style type="text/css">
        .blank-item{
            background-color: #d7e7ec;
            padding: 30px 20px 20px;
            margin-bottom: 20px;
        }

        .remove-passenger-container{
            text-align: right;
        }
        .remove-passenger{
            text-align: right;
            cursor: pointer;
        }

        .form-group{
            margin-bottom: 20px;
        }

        .buy-button{
            margin: 10px 0;
            width: 100%;
        }

        .required-field{
            border: 2px solid orange;
        }
    </style>


    <script src="/js/jquery.mask.js">

    </script>
    <script type="text/javascript">

        $('#blanksList').on('click', '.remove-passenger', function () {

            $(this).closest('div.blank-item').remove();
        });

        $('#blanksList').on('click', '.use-discount', function (e) {

            let $this = $(this);

            if ($this.prop('checked') == true) {
                $('.disable-on-discount', $(this).closest('div.blank-item')).prop('disabled', true);
                $('.enable-on-discount', $(this).closest('div.blank-item')).prop('disabled', false);
            } else {

                $('.enable-on-discount', $(this).closest('div.blank-item')).prop('disabled', true);

                let invalidEnabled = $('.use-invalid', $(this).closest('div.blank-item')).prop('checked');

                $('.disable-on-discount', $(this).closest('div.blank-item')).each(function (){
                    let $this = $(this);
                    if($this.hasClass('enable-invalid')){
                        if(invalidEnabled == true){
                            $this.prop('disabled', false);
                        }else{
                            $this.prop('disabled', true);
                        }
                    }else{
                        $this.prop('disabled', false);
                    }
                });

                //$('.disable-on-discount', $(this).closest('div.blank-item')).prop('disabled', false);
            }
        });

        $('#blanksList').on('click', '.use-invalid', function (e) {

            let $this = $(this);

            if ($this.prop('checked') == true) {
                $('.enable-invalid', $(this).closest('div.blank-item')).prop('disabled', false);
            } else {
                $('.enable-invalid', $(this).closest('div.blank-item')).prop('disabled', true);
            }
        });

        let initPhoneNumber = function (){
            $('.phone-number').mask('8 (999) 999 9999');
        }

        initPhoneNumber();

        let initDocNumberMask = function (){
            $('.document-type').change(function(){
                let $this = $(this);
                let index = $(this).data('index');
                let val = $this.val();
                let docSelector = '#blanks_' + index + '_document';

                /*if(val == 5){
                    $(docSelector).mask('999999999');
                    $(docSelector).attr('placeholder', '');
                }else */if(val == 0){
                    //$(docSelector).mask('99999999');
                    $(docSelector).attr('placeholder', 'вводить без N');
                }else{
                    $(docSelector).unmask();

                    $(docSelector).attr('placeholder', '');
                }
            });

            $('.document-type').change();
        }

        initDocNumberMask();

        let initPassengerAutoComplete = function (){
            $('.blank-surname').autocomplete({
                source: '{{ route('profileSearch') }}',
                minLength: 2,
                select: function (event, ui) {
                    let index = $(this).data('index');

                    $('#blanks_' + index + '_tariffType').val(ui.item.tariff_type);
                    $('#blanks_' + index + '_documentType').val(ui.item.document_dcts_code);
                    $('#blanks_' + index + '_document').val(ui.item.document);

                    $('#blanks_' + index + '_surname').val(ui.item.surname);
                    $('#blanks_' + index + '_name').val(ui.item.name);
                    $('#blanks_' + index + '_lastName').val(ui.item.last_name);

                    $('#blanks_' + index + '_passengerIin').val(ui.item.passenger_iin);
                    $('#blanks_' + index + '_sex').val(ui.item.sex);
                    $('#blanks_' + index + '_phone').val(ui.item.phone);
                    $('#blanks_' + index + '_citizenship').val(ui.item.country_dcts_code);

                    $('#blanks_' + index + '_birthday').val(ui.item.birthday);

                    return false;
                }
            });
        }

        initPassengerAutoComplete();

        $('#addPassenger').click(function (e) {
            e.preventDefault();
            let $this = $(this);
            let $items = $('.blank-item');

            let prototype = $this.data('blank-prototype');

            $('#blanksList').append(prototype.replace(/###index###/g, $items.length + 1));

            initPhoneNumber();
            initDocNumberMask();
            initPassengerAutoComplete();
        });
    </script>

    <style>

    </style>
@endsection
