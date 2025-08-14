@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href={{ route('stations.create') }}><i class="fa-solid fa-circle-plus"></i> Добавить</a>
        </div>
    </div>

    <table class="resp">
        <thead>
        <tr>
            <th>Код станции</th>
            <th>Наименование</th>
            <th>Дата создания</th>			
            <th></th>
        </tr>
        </thead>
        <tbody>
      @foreach ($StationAliass as $post)
            <tr>
                <td>{{ $post->station_code }}</td>
                <td>{{ $post->station_name }}</td>
                <td>{{ $post->created_at }}</td>				
                <td>				
                    <form action="{{ route('stations.destroy', $post->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
@section('pageScript')


@endsection
