@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action={{ route('stations.update', $StationAlias->id) }}>
                @csrf
				@method('PUT')				

                <div class="formdiv flatbox-light bt-tasks">


                    <div class="form-group">
                        <label for="station_code">Код станции</label>
					  <input type="text" class="form-control" id="title" name="station_code"
						value="{{ $StationAlias->station_code }}" required>						
                    </div>

                    <div class="form-group">
                        <label for="station_name">Наименование</label>
					  <input type="text" class="form-control" id="title" name="station_name"
						value="{{ $StationAlias->station_name }}" required>								
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="ms-2 btn btn-success mt-2 float-end">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection
