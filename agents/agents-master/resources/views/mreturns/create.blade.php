@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action={{ route('mreturns.store') }} enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="">
                <div class="formdiv flatbox-light bt-tasks">

                    <div class="form-group">
                        <label for="ticket_id">Билет</label>
                        <input class="form-control" name="ticket_id" id="ticket_id">	
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('ticket_id').'</span>'; ?>				
                    </div>

                    <div class="form-group">
                        <label for="amount">Сумма</label>
                        <input class="form-control" name="amount" id="amount">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('amount').'</span>'; ?>							
                    </div>
                    <div class="form-group">
                        <label for="krs">КРС</label>
                        <input class="form-control" name="krs" id="krs">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('krs').'</span>'; ?>									
                    </div>

                    <div class="form-group">
                        <label for="fks">FKS</label>
                        <input class="form-control" name="fks" id="fks">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('fks').'</span>'; ?>									
                    </div>
					
                    <div class="form-group">
                        <label for="manual_return_kassa_date">Дата возврата</label>
                        <input class="form-control" name="manual_return_kassa_date" id="manual_return_kassa_date">
						<?php echo '<span style="color:red;text-align:center;">'.$errors->first('manual_return_kassa_date').'</span>'; ?>									
                    </div>
					
                    <div class="mb-3">
                        <label for="">Выберите скан документа</label>
                        <input type="file" name="mr_krs_fileimage" required class="course form-control">
                    </div>					
                </div>
                <div class="form-group">
                    <button type="submit" class="ms-2 btn btn-success mt-2 float-end">Сохранить</button>
                </div>

            </form>
        </div>
    </div>	
	
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ошибка!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		{{-- implode('', $errors->all('<div>:message</div>')) --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>	

<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ошибка!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		{{ session('status1') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>	

    <form method="post" action="{{route('mreturns.update2')}}">
        @csrf
    <div class="modal" tabindex="-1" role="dialog" id="staticBackdrop2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Внимание!</h5>
                </div>
                <div class="modal-body">
					{{ session('status2') }}
                </div>
                <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-danger" >Перезаписать</button>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection

@section('pageScript')

@if($errors->any())
<script type="text/javascript">
	$(document).ready(function(){
				//$('#staticBackdrop').modal('show');
	});
</script>
@endif

@if(session('status1'))
<script type="text/javascript">
	$(document).ready(function(){
			$('#staticBackdrop1').modal('show');
	});
</script>
@endif

@if(session('status2'))
<script type="text/javascript">
	$(document).ready(function(){
			$('#staticBackdrop2').modal('show');
	});
</script>
@endif

    <script type="text/javascript">
        jQuery.datepicker.regional.ru = {
            closeText: "Закрыть",
            prevText: "Пред",
            nextText: "След",
            currentText: "Сегодня",
            monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
            monthNamesShort: [ "Янв", "Фев", "Мар", "Апр", "Май", "Июн",
                "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек" ],
            dayNames: [ "воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота" ],
            dayNamesShort: [ "вск", "пнд", "втр", "срд", "чтв", "птн", "сбт" ],
            dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
            weekHeader: "Нед",
            dateFormat: "dd.mm.yy",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: "" };
        jQuery.datepicker.setDefaults( jQuery.datepicker.regional.ru );
		
		jQuery.timepicker.regional['ru'] = {
			timeOnlyTitle: 'Выберите время',
			timeText: 'Время',
			hourText: 'Часы',
			minuteText: 'Минуты',
			secondText: 'Секунды',
			millisecText: 'Миллисекунды',
			timezoneText: 'Часовой пояс',
			currentText: 'Сейчас',
			closeText: 'Закрыть',
			timeFormat: 'HH:mm',
			amNames: ['AM', 'A'],
			pmNames: ['PM', 'P'],
			isRTL: false
		};
		jQuery.timepicker.setDefaults($.timepicker.regional['ru']);		


        $( "#manual_return_kassa_date" ).datetimepicker({
            //minDate: -0,
            //maxDate: "+1D",
            numberOfMonths: 1,
            dateFormat:'yy-mm-dd '
        });
    </script>

@endsection