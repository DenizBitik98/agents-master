@extends('layouts.app')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')
    @csrf
    @method('POST')
    <div class="container-fluid mt-6" style="display: flex; flex-direction: column; align-items: flex-end;">
        <div class="createIcon mb-3" style="display: flex; align-items: center;">
            <i class="fas fa-circle-plus" style="margin-right: 5px;"></i>
            <a href="{{ route('create.announcement.view') }}">
                <div>Создать объявление</div>
            </a>
        </div>
    </div>

    <table class="table table-bordered" id="announcement">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Тип</th>
                <th scope="col">Текст</th>
                <th scope="col">Дата начала</th>
                <th scope="col">Дата окончания</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата обновления</th>
                <th scope="col">Активен</th>
                <th scope="col">Действия</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($data as $announcement)
                <tr>
                    <td >{{ $announcement->id }}</td>
                    <td>{{ $announcement->type }}</td>
                    <td>{!! $announcement->text !!}</td>
                    <td>{{ $announcement->date_start }}</td>
                    <td>{{ $announcement->date_end }}</td>
                    <td>{{ $announcement->created_at }}</td>
                    <td>{{ $announcement->updated_at }}</td>
                    <td>{{ $announcement->is_active == 1 ? 'Вкл' : 'Выкл' }}</td>

                    <td>
                        <form action="{{ route('delete.announcement', $announcement->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $announcement->id }}" data-announcement-id="{{ $announcement->id }}">
                                <i class="fas fa-pencil-alt mr-4"></i>
                            </a>

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="exampleModal{{ $announcement->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p id="announcementIdPlaceholder{{ $announcement->id }}"></p>
                                </div>
                                <div>
                                    <label class="switch">  {{ 'Активировать ли объявление?' }} </label>
                                    <input type="checkbox" id="is_active{{ $announcement->id }}" name="is_active" value="1" {{ $announcement->is_active ? 'checked' : '0' }}>
                                    <span class="slider round"></span>

                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">{{trans('announcement.date_start')}}</label>
                                    <input type="datetime-local" class="form-control" name="date_start" id="dateStart{{ $announcement->id }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">{{trans('announcement.date_end')}}</label>
                                    <input type="datetime-local" class="form-control" name="date_end" id="dateEnd{{ $announcement->id }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary me-6" data-bs-dismiss="modal">Закрыть</button>
                                <button type="button" class="btn btn-primary" onclick="updateAnnouncement({{ $announcement->id }})">Обновить</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection

<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor',
        language: 'ru_RU',
        browser_spellcheck: true,
        plugins: 'lists, link, autolink, paste, fullscreen, addparag, wordcount',
        link_quicklink: true,
        menubar:false,
        toolbar: 'undo redo removeformat pastetext| bold italic | fontsizeselect link| userlookup | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | fullscreen',
        branding: false
    });

    function updateAnnouncement(announcementId) {
        var dateStart = $('#dateStart' + announcementId).val() || null;
        var dateEnd = $('#dateEnd' + announcementId).val() || null;
        var is_active = $('#is_active' + announcementId).prop('checked') ;

        var dataToSend = {
            _token: '{{ csrf_token() }}',
            is_active: is_active

        };

        if (dateStart !== null) {
            dataToSend.date_start = dateStart;
        }

        if (dateEnd !== null) {
            console.log("TEXT", dateEnd)
            dataToSend.date_end = dateEnd;
        }

        $.ajax({
            url: '/edit/' + announcementId,
            method: 'PUT',
            data: dataToSend,
            success: function(response) {
                console.log("SUCCESS ", response);
                location.reload();
            },
            error: function(error) {
                console.error("ERROR", error);
            }
        });
    }
</script>

<style>
    .switch {
        margin-bottom: 20px;
    }

    .container-fluid {
        margin-top: 0px;
    }

    .createIcon {
        position: absolute;

        right: 10px;
    }

     .table-bordered {
        margin-top: 50px;
    }

    #announcement tr:hover {background-color: coral;}

    #announcement th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
