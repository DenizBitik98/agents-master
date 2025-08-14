<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class SendRailwayRoute extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * SendRailwayRoute constructor.
     */
    public function __construct(){}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('mail.route');
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
		
		if (session()->has('departureStation') && session()->has('arrivalStation') && session()->has('departureDate')) {
			$this->attachData($this->createRoutePdf($ktjResponseFromCache)->output(), session('departureStation'). ' - '.session('arrivalStation').', ' .session('departureDate').'.pdf', [
					'mime' => 'application/pdf',
				]);
		}
		else {
			$this->attachData($this->createRoutePdf($ktjResponseFromCache)->output(), 'railwayRoute.pdf', [
					'mime' => 'application/pdf',
				]);
		}

        return $this;
    }

    /**
     * @param $tickets
     * @return \Barryvdh\Snappy\PdfWrapper
     */
    protected function createRoutePdf($ktjResponse){
        try {
            if ($ktjResponse !== null) {
                $forwardDirection = $ktjResponse->getForwardDirection();
                $backwardDirection = $ktjResponse->getBackwardDirection();
				
				$pdf = Pdf::loadView('railway.route.pdf', [
					'forwardDirection' => $forwardDirection,
					'backwardDirection' => $backwardDirection
				]);
				
				$pdf->setPaper('A4', 'portrait');					

                $pdf->render();

                return $pdf;
            }}catch (\Exception $e){
                throw $e;
        }
    }
}
