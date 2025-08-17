@inject('viewUtils', "App\Services\Utils\ViewUtils")

<table class="resp">
    <thead>
    <tr>
        <th>Тариф</th>
        <th>Тип документа</th>
        <th>Номер документа</th>
        <th>ФИО</th>
        <th>ИИН</th>
        <th>День рождения</th>
        <th>Пол</th>
        <th>Телефон</th>
        <th>Гражданство</th>
        <th>Внешний идентификатор</th>
        <th>Детали</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $profile)
        <tr>
            <td>{{ $viewUtils->getTariffTypeName($profile->tariff_type)}}</td>
            <td>{{$profile->document_name}}</td>
            <td>{{$profile->document}}</td>
            <td>{{$profile->surname}} {{$profile->name}} {{$profile->last_name}}</td>
            <td>{{$profile->passenger_iin}}</td>
            <td>{{$profile->birthday}}</td>
            <td>
                @if($profile->sex === 0)
                    Ж
                @else
                    М
                @endif
            </td>
            <td>{{$profile->phone}}</td>
            <td>{{$profile->country_name}}</td>
            <td>{{$profile->external_id}}</td>
            <td>{{$profile->note}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
