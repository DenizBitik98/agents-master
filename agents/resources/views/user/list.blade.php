@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success"
               href="{{route('userCreate', ['agentId'=>$agent->id])}}">{{ trans('user.buttons.new') }}</a>
        </div>
    </div>

    <table class="resp">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>id</th>
            <th>email</th>
            <th>роль</th>
            <th>заблокирован</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $user)
            <tr>
                <td>{{$user->fio}}</td>
                <td>{{$agent->company_name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    {{ trans('user.roles.'.$viewUtils->getAgentRoleName($user->role))}}
                </td>
                <td>{{$user->is_blocked == true ? 'да' : 'нет'}}</td>
                <td>
                    <a href="{{route('userEdit', ['id'=>$user->id])}}"
                       class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> {{ trans('common.edit') }}</a>
                    <a href="{{route('changePasswordToUser', ['id'=>$user->id])}}"
                       class="btn btn-primary btn-sm"><i class="fa-solid fa-unlock-keyhole"></i> {{ trans('user.buttons.changePassword') }}</a>
                    @if($user->is_blocked == true)
                        <a href="{{route('unBlockUser', ['id'=>$user->id])}}"
                           class="btn btn-success btn-sm mt-1"><i class="fa-solid fa-circle-play"></i> {{ trans('user.buttons.unblock') }}</a>
                    @else
                        <a href="{{route('blockUser', ['id'=>$user->id])}}"
                           class="btn btn-danger btn-sm mt-1"><i class="fa-solid fa-circle-stop"></i> {{ trans('user.buttons.block') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
