<table class="resp">
    <thead>
    <tr>
        <th>Название компании</th>
        <th>Телефон</th>
        <th>Адрес</th>
        <th>Email агентства</th>
        <th>Комиссия</th>
        <th>БИН</th>
        <th>НДС</th>
        <th>Статус агентства</th>
        <th>Пользователь</th>
        <th>Роль</th>
        <th>ID</th>
        <th>email пользователя</th>
        <th>Статус пользователя</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $agents)
        <tr>
            <td>{{$agents->company_name1}}</td>
            <td>{{$agents->phone_number1}}</td>
            <td>{{$agents->address1}}</td>
            <td>{{$agents->email1}}</td>
            <td>{{$agents->commission1}}</td>
            <td>{{$agents->bin1}}</td>
            <td>{{$agents->nds1}}</td>
            <td>
                @if($agents->is_blocked1 === false)
                    Активно
                @elseif ($agents->is_blocked1 === true)
                    Неактивно
                @else
                    Не определено
                @endif
            </td>
            <td>{{$agents->fio}}</td>
            <td>{{$agents->role}}</td>
            <td>{{$agents->name}}</td>
            <td>{{$agents->email}}</td>
            <td>
                @if($agents->is_blocked === false)
                    Активно
                @elseif ($agents->is_blocked === true)
                    Неактивно
                @else
                    Не определено
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
