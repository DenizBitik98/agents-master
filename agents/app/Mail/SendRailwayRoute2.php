<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class SendRailwayRoute2 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * SendRailwayRoute constructor.
     */
	public $id;
	public $dcs;
	public $acs;

	public function __construct($id, $dcs, $acs)
	{
		$this->id = $id;
		$this->dcs = $dcs;
		$this->acs = $acs;
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('mail.route');
		
		$results = session('results60');		
		$ktj60 = $results[$this->id]['x'];
		$ktj60date = $results[$this->id]['y'];
		
		$this->attachData($this->createRoutePdf($ktj60, $this->dcs, $this->acs, $ktj60date)->output(), $this->dcs. ' - '.$this->acs.', ' .$ktj60date.'.pdf', [
					'mime' => 'application/pdf',
				]);

        return $this;
    }

    /**
     * @param $tickets
     * @return \Barryvdh\Snappy\PdfWrapper
     */
    protected function createRoutePdf($ktjResponse, $dcs, $acs, $ktj60date){
        try {
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

                return $pdf;
            }}catch (\Exception $e){
                throw $e;
        }
    }
}
