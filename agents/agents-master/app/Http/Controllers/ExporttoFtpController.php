<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExporttoFtp;
use App\Models\Agent;

class ExporttoFtpController extends Controller
{
    public function searchAgent(Request $request)
    {

        $agents = Agent::All();

        $stData = [];

        foreach ($agents as $agent){
            $stData[] = [
                'value'=>$agent->company_name,
                'id'=>$agent->id,
            ];
        }

        return response()->json($stData);
    }	
	
  public function index()
  {
    $ExporttoFtps = ExporttoFtp::all();
    return view('exporttoftp.index', compact('ExporttoFtps'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    /*$request->validate([
      'agent_id' => 'required', 
      'ftp_login' => 'required',
      'ftp_password' => 'required',	  
      'ftp_address' => 'required',	  	  
    ]);*/
	
		$product = new ExporttoFtp();
		$product->agent_id = $request->agent_id;
		//$product->is_active = $request->is_active;
		$product->is_active = $request->input('is_active') ? true : false;
		$product->ftplog = $request->ftplog;
		$product->ftppass = $request->ftppass;
		$product->ftpadd = $request->ftpadd;
		$product->ftp_type = $request->ftp_type;		
		$product->date_start = date("Y-m-d H:i:s");
		$product->company_name = $request->company_name;		
							
		$product->save();	
	
    //ExporttoFtp::create($request->all());
    return redirect()->route('exporttoftp.index')
      ->with('success', 'ExporttoFtp created successfully.');
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $product = ExporttoFtp::find($id);
	
		//$product = new ExporttoFtp();
		//$product->agent_id = $request->agent_id;
		$product->is_active = $request->input('is_active') ? true : false;
		$product->ftplog = $request->ftplog;
		$product->ftppass = $request->ftppass;
		$product->ftpadd = $request->ftpadd;
		$product->ftp_type = $request->ftp_type;		
		//$product->date_start = date("Y-m-d H:i:s");
		$product->company_name = $request->company_name;	
	
	$product->save();	
    //$ExporttoFtp->update($request->all());
    return redirect()->route('exporttoftp.index')
      ->with('success', 'ExporttoFtp updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $ExporttoFtp = ExporttoFtp::find($id);
    $ExporttoFtp->delete();
    return redirect()->route('exporttoftp.index')
      ->with('success', 'ExporttoFtp deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new ExporttoFtp.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('exporttoftp.create');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $ExporttoFtp = ExporttoFtp::find($id);
    return view('exporttoftp.show', compact('ExporttoFtp'));
  }
  /**
   * Show the form for editing the specified ExporttoFtp.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $ExporttoFtp = ExporttoFtp::find($id);
    return view('exporttoftp.edit', compact('ExporttoFtp'));
  }
}
