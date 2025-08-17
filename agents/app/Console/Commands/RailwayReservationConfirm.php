<?php

namespace App\Console\Commands;

use App\AppModels\Balance\BalanceUpdateForm;
use App\AppModels\Balance\TransactionInterface;
use App\AppModels\RailwayReservation\ReservationStatus;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\InvalidOrderInfoException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\InvalidOrderStatusException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\OrderCanceledException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm\Response;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\Ticket as KTJTicket;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Common\PaymentInfo as KTJPaymentInfo;
use App\Models\Reservation;
use App\Models\SaleRailwayReservation;
use App\Models\SaleRailwayTicket;
use App\Services\KTJ\KTJService;
use App\Services\Utils\BalanceUtils;
use App\Services\Utils\Utils;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\TransferException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use \DateTime;
use \ReflectionException;
use \Exception;

class RailwayReservationConfirm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'railway:confirm:reservation';
    /**
     * @var null |  KtjService
     */
    protected $ktjService = null;
    /**
     * @var null | Utils
     */
    protected $utils = null;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var null | BalanceUtils
     */
    protected $balanceUtils = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(KTJService $ktjService, BalanceUtils $balanceUtils)
    {
        parent::__construct();

        $this->ktjService = $ktjService;
        $this->balanceUtils = $balanceUtils;

        $this->utils = new Utils($ktjService->getMachineKey());
        $this->utils->setKtjTerminal(env('dcts_terminal'));
        $this->utils->setKtjService($ktjService);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();

        try{
            $reservations = $this->findUnconfirmedReservations();

            foreach ($reservations as $reservation) {

                try {
                    $this->confirmReservation($reservation);
                } catch (TransferException $transferException) {
                    continue;
                }
            }


            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();

            throw $e;
        }

        return 0;
    }

    protected function confirmReservation(SaleRailwayReservation $reservation): ?SaleRailwayReservation
    {
        try {
            /** @var ConfirmRequest $ktjRequest */
            $ktjRequest = $this->utils->createReservationEntity2KTJConfirmRequest($reservation);

            /** @var ConfirmResponse $ktjResponse */
            $ktjResponse = $this->ktjService
                ->getETicketService()
                ->reservationConfirmAuthorized(
                    $ktjRequest
                );
            $reservation->reserved_at = new DateTime();
            $reservation->is_confirmed = true;
            $reservation->is_available_for_confirm = false;
            $reservation->status = ReservationStatus::RESERVATION_CONFIRMED;

            foreach ($ktjResponse->getTickets() as $ticket) {
                foreach ($reservation->getRelatedTickets as $mdlTicket) {
                    if ($mdlTicket->express_id == $ticket->getTicketId()) {
                        $mdlTicket->status_id = ReservationStatus::RESERVATION_CONFIRMED;

                        $mdlTicket->is_confirmed = true;
                        $mdlTicket->barcode = $ticket->getPaymentInfo()->getBarcodeText();
                        $mdlTicket->payment_number = $ticket->getPaymentInfo()->getPaymentNumber();
                        $mdlTicket->fiscal_document_number = $ticket->getPaymentInfo()->getFiscalNumber();
                        $mdlTicket->el_reg_status = $ticket->getElRegStatus();
                        $mdlTicket->payment_info_rnm = $ticket->getPaymentInfo()->getRNM() ? $ticket->getPaymentInfo()->getRNM() : "";
                        $mdlTicket->stop_date = $ticket->getStopDateTime();
                        //ofd
                        $mdlTicket->fiscal_document_number = $ticket->getPaymentInfo()->getFiscalDocumentNumber();
                        $mdlTicket->fiscalizator_type = $ticket->getPaymentInfo()->getFiscalizatorType();
                        $mdlTicket->fiscal_date = $ticket->getPaymentInfo()->getFiscalDate();
                        $mdlTicket->qr_code = $ticket->getPaymentInfo()->getQrCode();

                        $mdlTicket->save();
                    }
                }
            }
            $reservation->save();

            return $reservation;
        } catch (ReflectionException $exception) {
            throw $exception;
            return null;
        } catch (ClientException $exception) {
            $dctsException = ExceptionFactory::buildExceptionClassFromResponse($exception->getResponse());
            if ($dctsException instanceof InvalidOrderStatusException || $dctsException instanceof OrderCanceledException) {
                $reservation->is_confirmed = false;
                $reservation->is_available_for_confirm = false;
                $reservation->status = ReservationStatus::RESERVATION_CONFIRM_ERROR;

                $returnAmount = 0;
                foreach ($reservation->getRelatedTickets as $mdlTicket) {

                    $mdlTicket->is_confirmed = false;
                    $mdlTicket->status_id = ReservationStatus::RESERVATION_CONFIRM_ERROR;
                    $mdlTicket->save();

                    $returnAmount += $mdlTicket->getTotalCostWithAgentCommission();
                }

                $reservation->save();

                $balanceUpdateForm = new BalanceUpdateForm(TransactionInterface::ACTION_ADD);
                $balanceUpdateForm->setActionSum($returnAmount);

                $orderId = $reservation->reservation_id;
                $balanceUpdateForm->setOrderNumber($orderId);
                $agent = $reservation->getReservation->agent;
                $this->balanceUtils->processTransaction($agent, $balanceUpdateForm);

            }
            return null;
        } catch (ServerException $exception) {
            throw $exception;
            return null;
        } catch (Exception $exception) {
            throw $exception;
            return null;
        }
    }


    protected function findUnconfirmedReservations(){
        return SaleRailwayReservation::where('is_confirmed', '=', false)
            ->where('is_available_for_confirm', '=', true)->get();
    }
}
