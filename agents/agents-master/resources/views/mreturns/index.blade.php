@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href={{ route('mreturns.create') }}><i class="fa-solid fa-circle-plus"></i> Добавить</a>
        </div>
    </div>

    <table class="resp">
        <thead>
        <tr>
            <th>Транзакция</th>		
            <th>Билет</th>
            <th>Сумма</th>
            <th>КРС</th>
            <th>FKS</th>		
            <th>Автор</th>
            <th>Дата возврата</th>	
            <th>Дата ручного возврата</th>	
            <th>Скан документа</th>			
            <th></th>
        </tr>
        </thead>
        <tbody>
      @foreach ($SaleRailwayTicketReturn as $index=>$post)
            <tr>
                <td>{{ $post->transaction_id }}</td>			
                <td>{{ $post->ticket->express_id }}</td>
                <td>{{ $post->amount }}</td>
                <td>{{ $post->krs }}</td>
                <td>{{ $post->fks }}</td>	
                <td>{{ $post->author_id }} ({{$post->user->name .', '.$post->user->email }})</td>
                <td>{{ $post->manual_return_kassa_date }}</td>
                <td>{{ $post->manual_return_our_date }}</td>				
				<td>				
					<a href="#myModal" data-bs-toggle="modal" data-bs-target="#myModal" data-img-url="{{ asset('uploads/' . $post->mr_krs_fileimage) }}" >
						Показать
					</a>				
				</td>	
                <!--<td>				
                    <form action="{{ route('mreturns.destroy', $post->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>-->
            </tr>
        @endforeach
        </tbody>
    </table>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img class="" src="#" style="height:100%;width:100%;" alt="скан"/>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>	

@endsection
@section('pageScript')

<script type="text/javascript">

    $('td a').click(function(e) {
        $('#myModal img').attr('src', $(this).attr('data-img-url')); 
    });

</script>

@endsection