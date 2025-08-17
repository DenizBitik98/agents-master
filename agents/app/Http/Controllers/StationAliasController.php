<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StationAlias;
class StationAliasController extends Controller
{
	
	/*public function station2Count(Request $request)
    {
        $stationsCount = StationAlias::whereIn('station_type', [0, 2])->count();

        return response()->json($stationsCount);
    }*/
	
    public function station2(Request $request)
    {

        $stations = StationAlias::All();//whereIn('station_type', [0, 2])->skip($request->get('page', 0) * 100)->take(100)->get();::select('station_name','station_code')->where('station_type', [0, 2])->get();

        $stData = [];

        foreach ($stations as $station){
            $stData[] = [
                'value'=>$station->station_name,
                'id'=>$station->station_code,
            ];
        }

        return response()->json($stData);
    }	
	
    public function stati3(Request $request)
    {
        $stationsCount2 = StationAlias::All();
        $stationsCount = $stationsCount2->count();		

        return response()->json($stationsCount);
    }
	
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $StationAliass = StationAlias::all();
    return view('stations.index', compact('StationAliass'));
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
      'station_name' => 'required|max:255',
      'station_code' => 'required',
    ]);
    StationAlias::create($request->all());
    return redirect()->route('stations.index')
      ->with('success', 'StationAlias created successfully.');
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
    $request->validate([
      'station_name' => 'required|max:255',
      'station_code' => 'required',
    ]);
    $StationAlias = StationAlias::find($id);
    $StationAlias->update($request->all());
    return redirect()->route('stations.index')
      ->with('success', 'StationAlias updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $StationAlias = StationAlias::find($id);
    $StationAlias->delete();
    return redirect()->route('stations.index')
      ->with('success', 'StationAlias deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new StationAlias.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('stations.create');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $StationAlias = StationAlias::find($id);
    return view('stations.show', compact('StationAlias'));
  }
  /**
   * Show the form for editing the specified StationAlias.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $StationAlias = StationAlias::find($id);
    return view('stations.edit', compact('StationAlias'));
  }
}