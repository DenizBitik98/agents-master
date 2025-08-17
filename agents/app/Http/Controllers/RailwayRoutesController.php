<?php

namespace App\Http\Controllers;

use App\Mail\SendRailwayRoute;
use App\Mail\SendRailwayRoute2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class RailwayRoutesController extends Controller
{
    public function __construct()
    {
    }

    function sendRailwayRoutesToEmail(Request $request)
    {
        $email = $request->get('email');

        Mail::to($email)->send(new SendRailwayRoute());

		return redirect()->back(); 
    }
	
    function routePdf()
    {
		$id = session('ktjid');
		switch ($id) {
			case 0:
				$ktjResponseFromCache = Cache::store('redis')->get('ktjResponse');	
				break;
			case 1:
				$ktjResponseFromCache = Cache::store('redis')->get('ktjResponse_add1');					
				break;
			case 2:
				$ktjResponseFromCache = Cache::store('redis')->get('ktjResponse_add2');					
				break;
			case 3:
				$ktjResponseFromCache = Cache::store('redis')->get('ktjResponse_add3');					
				break;
			case 4:
				$ktjResponseFromCache = Cache::store('redis')->get('ktjResponse_add4');		
				break;	
			case 5:
				$ktjResponseFromCache = Cache::store('redis')->get('ktjResponse_add5');					
				break;
			case 6:
				$ktjResponseFromCache = Cache::store('redis')->get('ktjResponse_add6');		
				break;					
		}	

        return $this->renderPdf($ktjResponseFromCache);
    }
    function renderPdf($ktjResponse)
    {
        if ($ktjResponse !== null) {
            $forwardDirection = $ktjResponse->getForwardDirection();
            $backwardDirection = $ktjResponse->getBackwardDirection();


            $pdf = Pdf::loadView('railway.route.pdf', [
                'forwardDirection' => $forwardDirection,
                'backwardDirection' => $backwardDirection
            ]);

            $pdf->setPaper('A4', 'portrait');			

            $pdf->render();

            //return $pdf->download('available_routes.pdf');
			
				if (session()->has('departureStation') && session()->has('arrivalStation') && session()->has('departureDate')) {
					return $pdf->download(session('departureStation'). ' - '.session('arrivalStation').', ' .session('departureDate').'.pdf');
				}
				else {
					return $pdf->download('available_routes.pdf');
				}			
			
        }else{
            return null;
        }
    }
	
    function sendRailwayRoutesToEmail2(Request $request, $id, $dcs, $acs)
    {
        $email = $request->get('email');

        Mail::to($email)->send(new SendRailwayRoute2($id, $dcs, $acs));

		return redirect()->back(); 
    }	
	
    function routePdf2($id, $dcs, $acs)
    {
		$results = session('results60');		
		$ktj60 = $results[$id]['x'];
		$ktj60date = $results[$id]['y'];
		
		//$ktjResponseFromCache = $id;		

        return $this->renderPdf2($ktj60, $ktj60date, $dcs, $acs);
    }
    function renderPdf2($ktjResponse, $ktj60date, $dcs, $acs)
    {
        if ($ktjResponse !== null) {
            $forwardDirection = $ktjResponse->getForwardDirection();
            $backwardDirection = $ktjResponse->getBackwardDirection();


            $pdf = Pdf::loadView('railway.route.pdf2', [
                'forwardDirection' => $forwardDirection,
                'backwardDirection' => $backwardDirection,
				
                'departureStation' => $dcs,
                'arrivalStation' => $acs,
                'departureDate' => $ktj60date,			
            ]);

            $pdf->setPaper('A4', 'portrait');			

            $pdf->render();

            //return $pdf->download('available_routes.pdf');
			
			return $pdf->download($dcs. ' - '.$acs.', ' .$ktj60date.'.pdf');			
			
        }else{
            return null;
        }
    }	
}
