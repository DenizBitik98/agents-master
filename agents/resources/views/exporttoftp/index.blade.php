@extends('layouts.app')

@section('content')
<h4>Выгрузка xml в ftp</h4>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href={{ route('exporttoftp.create') }}><i class="fa-solid fa-circle-plus"></i> Добавить</a>
        </div>
    </div>

    <table class="resp">
        <thead>
        <tr>
            <th>Агент</th>
            <th>Активно?</th>	
            <th>Логин</th>
            <th>Пароль</th>
            <th>Адрес</th>	
            <th>Тип</th>
            <th>Email</th>			
            <th>Задача создана</th>				
            <th></th>
        </tr>
        </thead>
        <tbody>
      @foreach ($ExporttoFtps as $post)
            <tr>
                <td>{{ $post->agent_id }} ({{ ($post->agent->company_name ?? "") .', '. ($post->agent->email ?? "") }})</td>
                <td>{{ $post->is_active === true ? "Да" : "Нет"  }}</td>	
                <td>{{ $post->ftplog }}</td>
                <td>{{ $post->ftppass }}</td>
                <td>{{ $post->ftpadd }}</td>
                <td>{{ $post->ftp_type }}</td>	
                <td>{{ $post->company_name }}</td>					
                <td>{{ $post->date_start }}</td>					
                <td>	
                <div class="col-sm">
                  <a href="{{ route('exporttoftp.edit', $post->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
				</div>				
                    <form action="{{ route('exporttoftp.destroy', $post->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('pageScript')


@endsection
