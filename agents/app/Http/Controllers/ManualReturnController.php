<?php

namespace App\Http\Controllers;
use App\Models\SaleRailwayTicketReturn;
use App\Models\SaleRailwayTicket;
use App\Models\SaleRailwayReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManualReturnController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $SaleRailwayTicketReturn = SaleRailwayTicketReturn::whereIn('status', [51])->orderBy('manual_return_our_date', 'DESC')->get(); //SaleRailwayTicketReturn::all();
    return view('mreturns.index', compact('SaleRailwayTicketReturn'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'ticket_id' => 'required',
      //'status' => 'required',
      'amount' => 'required',
      'krs' => 'required',
      //'returned_at' => 'required',
      //'transaction_id' => 'required',
      'fks' => 'required',
      //'author_id' => 'required',
      'manual_return_kassa_date' => 'required',	  
      //'manual_return_our_date' => 'required',	
      //'mr_krs_filename' => 'required',
      //'mr_krs_fileimage' => 'required',	  
    ]);

	// поиск билета
	$ticket_id = SaleRailwayTicket::whereIn('express_id', [$request->ticket_id])->select('id', 'reservation_id')->first();
	if($ticket_id === null && empty($ticket_id)){
		return redirect()->back()->with('status1', 'Не найден билет: '.$request->ticket_id);	
	}	
	
	// поиск последней ручной транзакции для формирования номера транзакции
	$ticket_id_last = SaleRailwayTicketReturn::whereIn('status', [51])->orderBy('updated_at', 'desc')->select('transaction_id')->first();
	// увеличение на 1
	if(substr( json_decode($ticket_id_last)->transaction_id, 2, 1 ) === '0'){
		$ticket_id_last11 = '1'.substr( json_decode($ticket_id_last)->transaction_id, 2, null );		
		$ticket_id_last1 = substr($ticket_id_last11 + 1, 1, null );		
	}	
	else{
		$ticket_id_last1 = substr( json_decode($ticket_id_last)->transaction_id, 2, null ) + 1;	
	}
	$ticket_id_last2 = substr( json_decode($ticket_id_last)->transaction_id, 0, 2 ).''.$ticket_id_last1;
	
	// поиск резервации
	$reserve_id = SaleRailwayReservation::whereIn('id', [json_decode($ticket_id)->reservation_id])->select('id', 'reservation_id')->first();	
	if($reserve_id === null && empty($reserve_id)){
		return redirect()->back()->with('status1', 'Не найден резерв: '.$request->ticket_id);	
	}	
	
	// поиск автора
	$user_id = Reservation::whereIn('id', [json_decode($reserve_id)->reservation_id])->select('user_id')->first();
	if($user_id === null && empty($user_id)){
		return redirect()->back()->with('status1', 'Не найден автор резерва: '.$request->ticket_id);	
	}		
	
	// если в системе имеется возврат этого билета
	$ticket_id_is = SaleRailwayTicketReturn::whereIn('ticket_id', [json_decode($ticket_id)->id])->select('id')->first();
	if($ticket_id_is != null && !empty($ticket_id_is)){
		
		session(['amount1' => $request->input("amount")]);
		session(['krs1' => $request->input("krs")]);
		session(['fks1' => $request->input("fks")]);
		session(['id1' => $ticket_id_is]);	
		session(['id2r' => json_decode($reserve_id)->id]);
		session(['id3b' => json_decode($ticket_id)->id]);		
		session(['id4' => $ticket_id_last2]);			
		session(['mr_kassa_date' => $request->manual_return_kassa_date]);
		
		return redirect()->back()->with('status2', 'Билет уже имеется в таблице возвратов: '.$request->ticket_id)->with('statusid', $ticket_id_is);	
	}	
	
		$product = new SaleRailwayTicketReturn();
		$product->ticket_id = json_decode($ticket_id)->id;
		$product->status = 51;
		$product->amount = $request->amount;
		$product->krs = $request->krs;
		$product->returned_at = $request->manual_return_kassa_date;
		$product->transaction_id = $ticket_id_last2;	
		$product->fks = $request->fks;
		$product->author_id = json_decode($user_id)->user_id;
		$product->manual_return_kassa_date = $request->manual_return_kassa_date;	
		$product->manual_return_our_date = date("Y-m-d H:i:s");
		//$product->mr_krs_filename = $request->mr_krs_filename;
		//$product->mr_krs_fileimage = $request->mr_krs_fileimage;	
		
		//загружаем картинку
        if($request->hasfile('mr_krs_fileimage'))
        {
            $file = $request->file('mr_krs_fileimage');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/', $filename);
            $product->mr_krs_fileimage = $filename;
        }						
		$product->save();
		//session(['imname' => $product->mr_krs_filename]);
		session(['infile' => $product->mr_krs_fileimage]);			
		

		$product1 = SaleRailwayReservation::find(json_decode($reserve_id)->id);
		$product1->status = 51;
		$product1->save();	

		$product2 = SaleRailwayTicket::find(json_decode($ticket_id)->id);
		$product2->status_id = 51;
		$product2->save();			

    return redirect()->route('mreturns.index')
      ->with('success', 'SaleRailwayTicketReturn created successfully.');
  }
   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */  
   
  public function update2()
  {
	  
		$product = SaleRailwayTicketReturn::find(json_decode(session('id1'))->id);	  
		//$product->ticket_id = json_decode($ticket_id)->id;
		$product->status = 51;
		$product->amount = session('amount1');
		$product->krs = session('krs1');
		$product->returned_at = session('mr_kassa_date');
		$product->transaction_id = session('id4');	
		$product->fks = session('fks1');
		//$product->author_id = json_decode($user_id)->user_id;
		$product->manual_return_kassa_date = session('mr_kassa_date');
		$product->manual_return_our_date = date("Y-m-d H:i:s");
		//$product->mr_krs_filename = session('imname');
		$product->mr_krs_fileimage = session('infile');	
		$product->save();	
		
		$product1 = SaleRailwayReservation::find(session('id2r'));
		$product1->status = 51;
		$product1->save();				

		$product2 = SaleRailwayTicket::find(session('id3b'));
		$product2->status_id = 51;
		$product2->save();			

    return redirect()->route('mreturns.index')
      ->with('success', 'SaleRailwayTicketReturn updated successfully.');	  
  } 
  public function update(Request $request, $id)
  {
    $request->validate([
      'ticket_id' => 'required',
      'amount' => 'required',
      'krs' => 'required',
      'fks' => 'required',
    ]);
    $SaleRailwayTicketReturn = SaleRailwayTicketReturn::find($id);
    $SaleRailwayTicketReturn->update($request->all());
    return redirect()->route('mreturns.index')
      ->with('success', 'SaleRailwayTicketReturn updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $SaleRailwayTicketReturn = SaleRailwayTicketReturn::find($id);
    $SaleRailwayTicketReturn->delete();
    return redirect()->route('mreturns.index')
      ->with('success', 'SaleRailwayTicketReturn deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new SaleRailwayTicketReturn.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('mreturns.create');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $SaleRailwayTicketReturn = SaleRailwayTicketReturn::find($id);
    return view('mreturns.show', compact('SaleRailwayTicketReturn'));
  }
  /**
   * Show the form for editing the specified SaleRailwayTicketReturn.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $SaleRailwayTicketReturn = SaleRailwayTicketReturn::find($id);
    return view('mreturns.edit', compact('SaleRailwayTicketReturn'));
  }
}