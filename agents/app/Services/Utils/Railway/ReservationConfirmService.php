<?php


namespace App\Services\Utils\Railway;


use App\AppModels\Balance\BalanceUpdateForm;
use App\AppModels\Balance\TransactionInterface;
use App\AppModels\RailwayReservation\ReservationStatus;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\ExceptionFactory;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\InvalidOrderStatusException;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Exception\OrderCanceledException;
use App\Models\SaleRailwayReservation;
use App\Services\KTJ\KTJService;
use App\Services\Utils\Utils;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\App;
use \DateTime;
use \ReflectionException;
use \Exception;


class ReservationConfirmService
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

    public function __construct(KtjService $ktjService, Utils $utils)
    {
        $this->ktjService = $ktjService;
        $this->utils = $utils;
    }

    function confirmReservation(SaleRailwayReservation $reservation): ?SaleRailwayReservation
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

                $returnAmount = $reservation->agents_own_commission;
                foreach ($reservation->getRelatedTickets as $mdlTicket) {

                    $mdlTicket->is_confirmed = false;
                    $mdlTicket->status_id = ReservationStatus::RESERVATION_CONFIRM_ERROR;
                    $mdlTicket->save();

                    $returnAmount += $mdlTicket->getTotalCostWithAgentCommission();
                }

                $reservation->save();

                $balanceUpdateForm = new BalanceUpdateForm(TransactionInterface::ACTION_ADD);
                $balanceUpdateForm->setActionSum($returnAmount);

                $orderId = (string)$ticket->getReservation->reservation_id;
                $balanceUpdateForm->setOrderNumber($orderId);
                $agent = $ticket->getReservation->getReservation->agent;
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
}
