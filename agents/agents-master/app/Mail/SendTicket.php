<?php

namespace App\Mail;

use App\Models\Reservation;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTicket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Reservation
     */
    protected $order;
    /**
     * View name
     *
     * @var string
     */
    protected $viewName;

    /**
     * SendTicket constructor.
     * @param Reservation $order
     */
    public function __construct(Reservation $order, string $viewName)
    {
        $this->order = $order;
        $this->viewName = $viewName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('mail.ticket');

        $tickets = [];
        foreach($this->order->getRailwayReservationsRelations as $railwayReservation){
            foreach($railwayReservation->getRelatedTickets as $ticket){
                $tickets[] = $ticket;
            }
        }

        $this->attachData($this->creatTicketPdf($tickets)->output(), $tickets[0]->express_id.'.pdf', [
                'mime' => 'application/pdf',
            ]);

        return $this;
    }

    /**
     * @param $tickets
     * @return \Barryvdh\Snappy\PdfWrapper
     */
    protected function creatTicketPdf($tickets){
        $pdf = SnappyPdf::loadView($this->viewName, [
            'tickets'=> $tickets,
            'contactPhones'=>''
        ]);

        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('encoding', 'utf-8');
        $pdf->setOption('dpi', 300);
        $pdf->setOption('image-dpi', 300);
/*        $pdf->setOption('margin-left', 3);
        $pdf->setOption('margin-right', 1);*/
        $pdf->setOption('margin-top', 0);

        return $pdf;
    }
}
