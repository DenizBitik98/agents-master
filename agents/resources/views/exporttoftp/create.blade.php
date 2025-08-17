@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action={{ route('exporttoftp.store') }}>
                @csrf
                <input type="hidden" id="">
                <div class="formdiv flatbox-light bt-tasks">

                    <div class="form-group">
                        <label for="agent_id">Агент</label>
                        <input class="form-select"  id="company_name">
                        <input class="form-control" type="hidden" name="agent_id" id="agent_id">	
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('agent_id').'</span>'; ?>							
                    </div>

                    <div class="form-group">
                        <label for="is_active">Активно?</label>
						<input type="checkbox" name="is_active" class="switch-input" value="1" {{ old('is_active') ? 'checked="checked"' : '0' }}/>						
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('is_active').'</span>'; ?>							
                    </div>

                    <div class="form-group">
                        <label for="ftplog">Логин</label>
                        <input class="form-control" name="ftplog">		
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('ftplog').'</span>'; ?>							
                    </div>

                    <div class="form-group">
                        <label for="ftppass">Пароль</label>
                        <input class="form-control" name="ftppass">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('ftppass').'</span>'; ?>							
                    </div>
					
                    <div class="form-group">
                        <label for="ftpadd">Адрес</label>
                        <input class="form-control" name="ftpadd">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('ftpadd').'</span>'; ?>							
                    </div>
					
                    <div class="form-group">
                        <label for="ftpadd">Тип</label>					
									<select class="form-control" id="" name="ftp_type">
										<option value="">Выберите тип</option>
										<option value="ftp" >ftp</option>
										<option value="sftp" >sftp</option>
									</select>						
                    </div>	
                    <div class="form-group">
                        <label for="ftpadd">Email</label>
                        <input class="form-control" name="company_name">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('company_name').'</span>'; ?>							
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
            $('#company_name').autocomplete({
            source: '/exporttoftp/searchAgent',
            minLength: 2,
            select: function (event, ui) {

                $('#company_name').val(ui.item.value);
                $('#agent_id').val(ui.item.id);
            }
        });
        }
        createAutocompletes();

    </script>
@endsection
