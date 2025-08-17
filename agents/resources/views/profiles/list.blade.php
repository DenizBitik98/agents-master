@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success"
               href="{{route('profileCreate')}}">{{ trans('profile.buttons.new') }}</a>
            <a class="btn btn-success"
               href="{{route('profileList', ['export'=>1])}}">{{ trans('profile.buttons.export') }}</a>
        </div>
        @csrf
        <div>
            <form method="post"  action="{{ route('searchProfilesNew') }}">
                @csrf
                <input  type="text" name="surname" placeholder="Фамилия">
                <input type="text" name="passenger_iin" placeholder="ИИН">
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
        </div>
    </div>

    <table class="resp">
        <thead>
        <tr>
            <th>Тариф</th>
            <th>ФИО</th>
            <th>ИИН</th>
            <th>Тип документа</th>
            <th>Номер документа</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $profile)
            <tr>
                <td>{{ $viewUtils->getTariffTypeName($profile->tariff_type)}}</td>
                <td>{{$profile->surname}} {{$profile->name}} {{$profile->last_name}}</td>
                <td>{{$profile->passenger_iin}}</td>
                <td>{{$profile->document_name}}</td>
                <td>{{$profile->document}}</td>
                <td>
                    <a href="{{route('profileEdit', ['id'=>$profile->id])}}"
                       class="btn btn-success">{{ trans('common.edit') }}</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
{{--<script type="text/javascript">--}}
{{--    $('#departureStation').autocomplete({--}}
{{--        source: '/railway/searchStation',--}}
{{--        minLength: 2,--}}
{{--        select: function (event, ui) {--}}
{{--            //$('#departureStationCode').val(suggestion.data);--}}
{{--            $('#departureStation').val(ui.item.value);--}}
{{--            $('#departureStationCode').val(ui.item.id);--}}
{{--        }--}}
{{--    });--}}

{{--    $('#arrivalStation').autocomplete({--}}
{{--        source: '/railway/searchStation',--}}
{{--        minLength: 1,--}}
{{--        select: function (event, ui) {--}}
{{--            //$('#arrivalStationCode').val(suggestion.data);--}}

{{--            $('#arrivalStation').val(ui.item.value);--}}
{{--            $('#arrivalStationCode').val(ui.item.id);--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
