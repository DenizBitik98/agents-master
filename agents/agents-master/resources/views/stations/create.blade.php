@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action={{ route('stations.store') }}>
                @csrf
                <input type="hidden" id="">
                <div class="formdiv flatbox-light bt-tasks">

                    <div class="form-group">
                        <label for="station_code">Станция</label>
                        <input class="form-select" id="station_name">
                        <input class="form-control" type="hidden" name="station_code" id="station_code">						
                    </div>

                    <div class="form-group">
                        <label for="station_name">Наименование</label>
                        <input class="form-control" name="station_name">
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="ms-2 btn btn-success mt-2 float-end">Сохранить</button>
                </div>

            </form>
        </div>
    </div>

@endsection
@section('pageScript')
    <script type="text/javascript">

        function createAutocompletes(){
            $('#station_name').autocomplete({
            source: '/railway/searchStation',
            minLength: 2,
            select: function (event, ui) {

                $('#station_name').val(ui.item.value);
                $('#station_code').val(ui.item.id);
            }
        });
        }
        createAutocompletes();

    </script>
@endsection
