<?php

namespace App\Http\Controllers;

use App\AppModels\RailwayReservation\ReservationStatus;
use App\Common\Utils\DayShiftUtils;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Info\ReturnTicketResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn\TicketReturnRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Ticket\ApplyReturn\TicketReturnResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\Mail\SendTicket;
use App\Models\Reservation;
use App\Models\SaleRailwayCarType;
use App\Models\SaleRailwayReservation;
use App\Models\SaleRailwayTicket;
use App\Models\SaleRailwayTicketReturn;
use App\Services\KTJ\KTJService;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Knp\Snappy\Image;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Mail\SendRailwayRoute;

class TicketController extends Controller
{
    const TICKET_PDF_VIEW_NAME ="railway.ticket.ticket-ver2";
    const TICKET_PDF_VIEW_NAME_PREV ="railway.ticket.ticket";
    const TICKET_PDF_VIEW_VERSION_NEW ="new";

    /**
     * @var null |  KtjService
     */
    protected $ktjService = null;

    public function __construct(KtjService $ktjService)
    {
        $this->ktjService = $ktjService;

        $this->middleware('auth');
    }

    protected function getTicketFormViewName(Request $request){
        $view = self::TICKET_PDF_VIEW_NAME_PREV;
        $version = $request->get('version', '');

        if($version == self::TICKET_PDF_VIEW_VERSION_NEW){
            $view = self::TICKET_PDF_VIEW_NAME;
        }

        return $view;

    }


    public function html(Request $request)
    {
        $ticketId = $request->get('ticketId');
        $ticket = $this->findTicket($ticketId);

        /*if(!$this->isGranted('ROLE_ADMIN')){
            $this->denyAccessUnlessGranted(RailwayTicketVoter::DOWNLOAD, $ticket);
        }*/
        $view = $this->getTicketFormViewName($request);

        return view($view, [
            'tickets'=>[$ticket],
            'contactPhones'=>''

        ]);
    }

    public function invoiceHtml(Request $request)
    {
        $ticketId = $request->get('ticketId');

        $ticket = $this->findTicket($ticketId);

        /*if(!$this->isGranted('ROLE_ADMIN')){
            $this->denyAccessUnlessGranted(RailwayTicketVoter::DOWNLOAD, $ticket);
        }*/

        return view('railway.ticket.invoice.ticket', [
            'ticket'=>$ticket,
            'contactPhones'=>[''],
            'terminal'=>env('dcts_terminal'),

        ]);
    }

    public function image(Request $request/*, Image $knpSnappyImage*/): View
    {
        $ticketId = $request->get('ticketId');

        $ticket = $this->findTicket($ticketId);

        /*if(!$this->isGranted('ROLE_ADMIN')){
            $this->denyAccessUnlessGranted(RailwayTicketVoter::DOWNLOAD, $ticket);
        }*/

        $html = view(self::TICKET_PDF_VIEW_NAME, [
            'tickets'=>[$ticket],
            'contactPhones'=>''

        ])->render();

        $snappy = App::make('ticket.pdf');

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );
    }

    function pdf(Request $request)
    {
        $ticketId = $request->get('ticketId');
        $ticket = $this->findTicket($ticketId);
        $view = $this->getTicketFormViewName($request);

        return $this->renderPdf([$ticket], $view);
    }

    function invoicePdf(Request $request)
    {
        $ticketId = $request->get('ticketId');
        $ticket = $this->findTicket($ticketId);

        return $this->renderInvoice($ticket);
    }

    function passengerTicketsPdf(Request $request)
    {
        $orderId = $request->get('orderId');
        $passengerName = $request->get('passengerName');
        $order = Reservation::find($orderId);
        $tickets = [];
        foreach($order->getRailwayReservationsRelations as $railwayReservation){
            foreach($railwayReservation->getRelatedTickets as $ticket){
                foreach($ticket->getRelatedPassengers as $passenger){
                    if($passenger->name == $passengerName){
                        $tickets[] = $ticket;
                    }
                }
            }
        }

        $view = $this->getTicketFormViewName($request);

        return $this->renderPdf($tickets, $view);
    }

    function orderTicketsPdf(Request $request)
    {
        $orderId = $request->get('orderId');

        $order = Reservation::find($orderId);
        $tickets = [];
        foreach($order->getRailwayReservationsRelations as $railwayReservation){
            foreach($railwayReservation->getRelatedTickets as $ticket){
                $tickets[] = $ticket;
            }
        }

        $view = $this->getTicketFormViewName($request);

        return $this->renderPdf($tickets, $view);
    }

    function orderTicketsAll(Request $request)
    {
        $orderId = $request->get('orderId');

        $order = Reservation::find($orderId);
        $tickets = [];
        foreach($order->getRailwayReservationsRelations as $railwayReservation){
            foreach($railwayReservation->getRelatedTickets as $ticket){
                $tickets[] = $ticket;
            }
        }

        return view(self::TICKET_PDF_VIEW_NAME, [
            'tickets'=>$tickets,
            'contactPhones'=>''

        ]);
    }

    function sendTicketsToEmail(Request $request)
    {
        $orderId = $request->get('orderId');
        $email = $request->get('email');

        $order = Reservation::find($orderId);
        $view = $this->getTicketFormViewName($request);

        Mail::to($email)->send(new SendTicket($order, $view));

        return redirect()->route('ordersInfo', [
            'reservationId' => $orderId
        ]);
    }


    function renderPdf($tickets, $view){
        $pdf = SnappyPdf::loadView($view, [
            'tickets'=> $tickets,
            'contactPhones'=>''
        ]);

        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);

        $pdf->setOption('enable-smart-shrinking', false);

        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('encoding', 'utf-8');

        $pdf->setOption('dpi', 300);
        $pdf->setOption('image-dpi', 300);
        /*$pdf->setOption('margin-left', 3);
        $pdf->setOption('margin-right', 1);*/
        $pdf->setOption('margin-top', 0);

        return $pdf->download($tickets[0]->express_id.'.pdf');
    }

    function renderInvoice($ticket){
        $pdf = SnappyPdf::loadView('railway.ticket.invoice.ticket', [
            'ticket'=> $ticket,
            'contactPhones'=>[''],
            'terminal'=>env('dcts_terminal'),
        ]);

        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);

        $pdf->setOption('enable-smart-shrinking', false);

        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('encoding', 'utf-8');

        $pdf->setOption('dpi', 300);
        $pdf->setOption('image-dpi', 300);
        $pdf->setOption('margin-left', 3);
        $pdf->setOption('margin-right', 1);
        $pdf->setOption('margin-top', 0);

        return $pdf->download($ticket->express_id.' КРС.pdf');
    }



    public function return(Request $request){
        $ticketId = $request->input('ticketId');

        $ticket = $this->findTicket($ticketId);
        $returnInformation = null;

/*        $reservation = SaleRailwayReservation::find($ticket->reservation_id);
        foreach ($reservation->getRelatedTickets as $ticket){

        }*/

        try {
            /** @var ReturnTicketResponse $returnInformation */
            $returnInformation = $this->ktjService->getReturnETicketService()
                ->ticketInformationAuthorized(
                    new ReturnTicketRequest(
                        $ticket->getReservation->api_id,
                        $ticket->ticket_id
                    )
                );

        } catch (ServerException $exception) {
            return view('railway.ticket.return.error', [
                'message'=>$exception->getCode(),
            ]);
        } catch (ClientException $exception) {
            $exception = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
            return view('railway.ticket.return.error', [
                'message' => $exception->getMessage()
            ]);
        }

        return view('railway.ticket.return.return', [
            'returnInformation'=>$returnInformation,
            'bdTicket' => $ticket,
        ]);
    }

    public function returnConfirm(Request $request){
        $ticketId = $request->input('ticketId');

        $ticket = $this->findTicket($ticketId);

        try {
            /** @var TicketReturnResponse $ktjResponse */
            $ktjResponse = $this->ktjService->getReturnETicketService()
                ->returnTicketAuthorized(
                    TicketReturnRequest::getInstance(
                        $ticket->getReservation->api_id,
                        $ticket->ticket_id
                    )
                );

            $user = Auth::user();

            $returnTicket = $ticket->tickerReturn;
            if(null == $returnTicket){
                $returnTicket = new SaleRailwayTicketReturn();
                $returnTicket->ticket_id = $ticket->id;
            }

            $returnTicket->author_id = $user->id;
            $returnTicket->transaction_id = $ktjResponse->getReturnOperationTransactionId();
            $returnTicket->status = SaleRailwayTicketReturn::STATUS_NOT_CHECKED;

            $returnTicket->save();

            $ticket->status_id = ReservationStatus::RESERVATION_RETURNING;

            $ticket->save();

        } catch (ServerException $exception) {
            return view('railway.ticket.return.error', [
                'message'=>$exception->getCode(),
            ]);
        } catch (ClientException $exception) {
            $exception = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
            return view('railway.ticket.return.error', [
                'message' => $exception->getMessage()
            ]);
        }

        return redirect()->route('ordersInfo', [
            'reservationId' => $ticket->getReservation->reservation_id
        ]);
    }

    public function rules(){
        return view('railway.ticket.rules', [
        ]);
    }


    /**
     * @param $ticketId
     * @return SaleRailwayTicket| null
     */
    protected function findTicket($ticketId) {

        $ticket = SaleRailwayTicket::find($ticketId);

        if (null === $ticket) {
            throw new NotFoundHttpException('Ticket not found');
        }

        return $ticket;
    }

}
