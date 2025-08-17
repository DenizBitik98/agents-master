@extends('layouts.app')
@inject('markIt', 'Helper')
@inject('viewUtils', "App\Services\Utils\ViewUtils")

@section('content')		
<h4>Расписание</h4> <i>(на 30 дней от текущей даты)</i>
<p>Направление: {{ $dcs1 }} - {{ $acs1 }}</p>
{{-- var_dump($executionTime) --}} 
<br>
<a class="btn btn-primary" onclick="window.history.back()">Назад</a>
<br>
@php($startTime1 = microtime(true))
<table class="table table-striped">
  <tr>
    <th>№</th>
    <th>Дата</th>
	<th>Номер поезда и стоимость от</th>
    <th>Статус</th>	
    <th>Скачать</th>	
  </tr><tbody>
  @for($i = 0; $i < count($results); $i++)
	  @if($markIt->combansw(mb_strtolower(mb_substr($results[$i]['z'], -9))) != 'не ходит' && $markIt->combansw(mb_strtolower(mb_substr($results[$i]['z'], -9))) != 'нет данных')	
		                      <tr>
						<td></td>						
						<td>{{$results[$i]['y']}}</td>	<td>
		@if($results[$i]['x'])						
		@if( $results[$i]['x']->getForwardDirection() != null && count($results[$i]['x']->getForwardDirection()->getTrains()) > 0)				
            @foreach($results[$i]['x']->getForwardDirection()->getTrains() as $trainCollection)
                @foreach($trainCollection->getTrainsCollection() as $train)			
                        
                            {{$train->getNumber2()}} <span>__________________</span>
							
							@php($cart0 = array())

                            @foreach($train->getCars() as $car)
									@php(array_push($cart0, $viewUtils->getCarTypeName($car->getType()). " ".$car->getMinTariff()->getTariffValue()+ $markIt->agent_prof()[0] + $markIt->agent_prof()[1] . " KZT"))
                            @endforeach
							
							{{!empty($cart0) ?  min($cart0) : ""}}
							<br>
                @endforeach
            @endforeach
		@endif	
		@endif		
						</td>
						<td>{{ $markIt->combansw(mb_strtolower(mb_substr($results[$i]['z'], -9))) }}</td>
						<td>@if($markIt->combansw(mb_strtolower(mb_substr($results[$i]['z'], -9))) == '')<form method="post" action="{{route('routePdf2', [$i, $dcs1, $acs1] )}}">@csrf<button type="submit" class="btn btn-primary btn-sm" >Скачать тут</button>&nbsp;<button type="button" onclick="sendEmail{{$i}}()" class="btn btn-primary btn-sm"" id="sendEmailButton "><i class="fas fa-paper-plane"></i>На почту</button></form>@endif</td>				
                    </tr>	
	 @endif	
				<form method="post" action="{{route('sendRailwayRoutesToEmail2', [$i, $dcs1, $acs1])}}">
					@csrf
				<div class="modal" tabindex="-1" role="dialog" id="emailModal{{$i}}">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Наберите почту</h5>
							</div>
							<div class="modal-body">
								<label for="emailInput">Почта:</label>
								<input class="form-control" id="emailInput" name="email" value="">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="closeModal{{$i}}()">Закрыть</button>
								<button type="submit" class="btn btn-primary" >Отправить</button>
							</div>
						</div>
					</div>
				</div>
				</form>		 
  @endfor
  </tbody>		
</table>


@php($endTime3 = microtime(true))
@php($executionTime4 = $endTime3 - $startTime1)
{{-- var_dump($executionTime4) --}}				
@endsection

@section('pageScript')
<script type="text/javascript">
function updateTableNumeration() {
    $('.table tbody tr').each(function(i) {
          $(this).find('td:first').text(i+".");
    });
}    


updateTableNumeration();
</script>
    <script type="text/javascript">
        function sendEmail0() {
            let emailModal0 = new bootstrap.Modal(document.getElementById('emailModal0'));
            emailModal0.show();
        }

        function closeModal0() {
            $('#emailModal0').modal('hide');
        }

        function sendEmail1() {
            let emailModal1 = new bootstrap.Modal(document.getElementById('emailModal1'));
            emailModal1.show();
        }

        function closeModal1() {
            $('#emailModal1').modal('hide');
        }

        function sendEmail2() {
            let emailModal2 = new bootstrap.Modal(document.getElementById('emailModal2'));
            emailModal2.show();
        }

        function closeModal2() {
            $('#emailModal2').modal('hide');
        }

        function sendEmail3() {
            let emailModal3 = new bootstrap.Modal(document.getElementById('emailModal3'));
            emailModal3.show();
        }

        function closeModal3() {
            $('#emailModal3').modal('hide');
        }

        function sendEmail4() {
            let emailModal4 = new bootstrap.Modal(document.getElementById('emailModal4'));
            emailModal4.show();
        }

        function closeModal4() {
            $('#emailModal4').modal('hide');
        }

        function sendEmail5() {
            let emailModal5 = new bootstrap.Modal(document.getElementById('emailModal5'));
            emailModal5.show();
        }

        function closeModal5() {
            $('#emailModal5').modal('hide');
        }

        function sendEmail6() {
            let emailModal6 = new bootstrap.Modal(document.getElementById('emailModal6'));
            emailModal6.show();
        }

        function closeModal6() {
            $('#emailModal6').modal('hide');
        }

        function sendEmail7() {
            let emailModal7 = new bootstrap.Modal(document.getElementById('emailModal7'));
            emailModal7.show();
        }

        function closeModal7() {
            $('#emailModal7').modal('hide');
        }

        function sendEmail8() {
            let emailModal8 = new bootstrap.Modal(document.getElementById('emailModal8'));
            emailModal8.show();
        }

        function closeModal8() {
            $('#emailModal8').modal('hide');
        }

        function sendEmail9() {
            let emailModal9 = new bootstrap.Modal(document.getElementById('emailModal9'));
            emailModal9.show();
        }

        function closeModal9() {
            $('#emailModal9').modal('hide');
        }
        function sendEmail110() {
            let emailModal110 = new bootstrap.Modal(document.getElementById('emailModal110'));
            emailModal110.show();
        }

        function closeModal110() {
            $('#emailModal110').modal('hide');
        }

        function sendEmail11() {
            let emailModal11 = new bootstrap.Modal(document.getElementById('emailModal11'));
            emailModal11.show();
        }

        function closeModal11() {
            $('#emailModal11').modal('hide');
        }

        function sendEmail12() {
            let emailModal12 = new bootstrap.Modal(document.getElementById('emailModal12'));
            emailModal12.show();
        }

        function closeModal12() {
            $('#emailModal12').modal('hide');
        }

        function sendEmail13() {
            let emailModal13 = new bootstrap.Modal(document.getElementById('emailModal13'));
            emailModal13.show();
        }

        function closeModal13() {
            $('#emailModal13').modal('hide');
        }

        function sendEmail14() {
            let emailModal14 = new bootstrap.Modal(document.getElementById('emailModal14'));
            emailModal14.show();
        }

        function closeModal14() {
            $('#emailModal14').modal('hide');
        }

        function sendEmail15() {
            let emailModal15 = new bootstrap.Modal(document.getElementById('emailModal15'));
            emailModal15.show();
        }

        function closeModal15() {
            $('#emailModal15').modal('hide');
        }

        function sendEmail16() {
            let emailModal16 = new bootstrap.Modal(document.getElementById('emailModal16'));
            emailModal16.show();
        }

        function closeModal16() {
            $('#emailModal16').modal('hide');
        }

        function sendEmail17() {
            let emailModal17 = new bootstrap.Modal(document.getElementById('emailModal17'));
            emailModal17.show();
        }

        function closeModal17() {
            $('#emailModal17').modal('hide');
        }

        function sendEmail18() {
            let emailModal18 = new bootstrap.Modal(document.getElementById('emailModal18'));
            emailModal18.show();
        }

        function closeModal18() {
            $('#emailModal18').modal('hide');
        }

        function sendEmail19() {
            let emailModal19 = new bootstrap.Modal(document.getElementById('emailModal19'));
            emailModal19.show();
        }

        function closeModal19() {
            $('#emailModal19').modal('hide');
        }	
		
        function sendEmail220() {
            let emailModal220 = new bootstrap.Modal(document.getElementById('emailModal220'));
            emailModal220.show();
        }

        function closeModal220() {
            $('#emailModal220').modal('hide');
        }

        function sendEmail21() {
            let emailModal21 = new bootstrap.Modal(document.getElementById('emailModal21'));
            emailModal21.show();
        }

        function closeModal21() {
            $('#emailModal21').modal('hide');
        }

        function sendEmail22() {
            let emailModal22 = new bootstrap.Modal(document.getElementById('emailModal22'));
            emailModal22.show();
        }

        function closeModal22() {
            $('#emailModal22').modal('hide');
        }

        function sendEmail23() {
            let emailModal23 = new bootstrap.Modal(document.getElementById('emailModal23'));
            emailModal23.show();
        }

        function closeModal23() {
            $('#emailModal23').modal('hide');
        }

        function sendEmail24() {
            let emailModal24 = new bootstrap.Modal(document.getElementById('emailModal24'));
            emailModal24.show();
        }

        function closeModal24() {
            $('#emailModal24').modal('hide');
        }

        function sendEmail25() {
            let emailModal25 = new bootstrap.Modal(document.getElementById('emailModal25'));
            emailModal25.show();
        }

        function closeModal25() {
            $('#emailModal25').modal('hide');
        }

        function sendEmail26() {
            let emailModal26 = new bootstrap.Modal(document.getElementById('emailModal26'));
            emailModal26.show();
        }

        function closeModal26() {
            $('#emailModal26').modal('hide');
        }

        function sendEmail27() {
            let emailModal27 = new bootstrap.Modal(document.getElementById('emailModal27'));
            emailModal27.show();
        }

        function closeModal27() {
            $('#emailModal27').modal('hide');
        }

        function sendEmail28() {
            let emailModal28 = new bootstrap.Modal(document.getElementById('emailModal28'));
            emailModal28.show();
        }

        function closeModal28() {
            $('#emailModal28').modal('hide');
        }

        function sendEmail29() {
            let emailModal29 = new bootstrap.Modal(document.getElementById('emailModal29'));
            emailModal29.show();
        }

        function closeModal29() {
            $('#emailModal29').modal('hide');
        }			
    </script>
@endsection