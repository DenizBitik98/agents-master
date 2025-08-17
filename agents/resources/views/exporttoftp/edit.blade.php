@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action={{ route('exporttoftp.update', $ExporttoFtp->id) }}>
                @csrf
				@method('PUT')				

                <div class="formdiv flatbox-light bt-tasks">

                    <div class="form-group">
                        <label for="agent_id">Агент</label>
                        <input class="form-select"  id="company_name" value="{{ $ExporttoFtp->agent_id }} ({{ ($ExporttoFtp->agent->company_name ?? "") .', '. ($ExporttoFtp->agent->email ?? "") }})" disabled>
                        <input class="form-control" type="hidden" name="agent_id" id="agent_id" value="{{ $ExporttoFtp->agent_id }}">	
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('agent_id').'</span>'; ?>							
                    </div>

                    <div class="form-group">
                        <label for="is_active">Активно?</label>
						<input type="checkbox" name="is_active" class="switch-input" value="1" @if ($ExporttoFtp->is_active == true) {{ 'checked' }} @endif />						
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('is_active').'</span>'; ?>							
                    </div>

                    <div class="form-group">
                        <label for="ftplog">Логин</label>
                        <input class="form-control" name="ftplog"  value="{{ $ExporttoFtp->ftplog }}">		
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('ftplog').'</span>'; ?>							
                    </div>

                    <div class="form-group">
                        <label for="ftppass">Пароль</label>
                        <input class="form-control" name="ftppass"  value="{{ $ExporttoFtp->ftppass }}">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('ftppass').'</span>'; ?>							
                    </div>
					
                    <div class="form-group">
                        <label for="ftpadd">Адрес</label>
                        <input class="form-control" name="ftpadd"  value="{{ $ExporttoFtp->ftpadd }}">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('ftpadd').'</span>'; ?>							
                    </div>
					
                    <div class="form-group">
                        <label for="ftpadd">Тип</label>					
									<select class="form-control" id="ftp_type" name="ftp_type" >
										<option value="">Выберите тип</option>
										<option value="ftp" @if ($ExporttoFtp->ftp_type == "ftp") {{ 'selected' }} @endif>ftp</option>
										<option value="sftp" @if ($ExporttoFtp->ftp_type == "sftp") {{ 'selected' }} @endif>sftp</option>
									</select>						
                    </div>	
                    <div class="form-group">
                        <label for="ftpadd">Email</label>
                        <input class="form-control" name="company_name"  value="{{ $ExporttoFtp->company_name }}">
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
