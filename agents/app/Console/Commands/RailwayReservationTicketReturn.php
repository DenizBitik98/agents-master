<?php

namespace App\Console\Commands;

use App\AppModels\Balance\BalanceUpdateForm;
use App\AppModels\Balance\TransactionInterface;
use App\AppModels\RailwayReservation\ReservationStatus;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Fail\ApplyFailRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ApplySuccessRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\Refund;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ReturnRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature\SignatureRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\RejectInfo;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\StatusRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\StatusResponse;
use App\KTJ\Klabs\KTJBundle\Signature\Signature;
use App\Models\SaleRailwayReservation;
use App\Models\SaleRailwayTicket;
use App\Models\SaleRailwayTicketReturn;
use App\Services\Helpers\ArrayHelper;
use App\Services\KTJ\KTJService;
use App\Services\Utils\BalanceUtils;
use App\Services\Utils\Utils;
use App\Utils\ProcessLocker;
use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\TransferException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

class RailwayReservationTicketReturn extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'railway:ticket:return';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Возврат бидетов';

    /**
     * @var null |  KtjService
     */
    protected $ktjService = null;
    /**
     * @var null | BalanceUtils
     */
    protected $balanceUtils = null;
    /**
     * @var null | Utils
     */
    protected $utils = null;


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

        // ps aux | grep "ticket_return_process_0"
        $title = 'ticket_return_process_0';
        try {
            cli_set_process_title($title);
        } catch (\Exception $e) {

        }

        $locker = new ProcessLocker('ticket-return');

        if(!$locker->isLocked()){
            $locker->lockProcess();
        } else{
            echo 'The command is already running in another process.';

            return 0;
        }

        $repeat = 4000;
        $sleep = 5;
        $i = 0;
        while ($i++ < $repeat){
            $this->returnTickets();

            sleep($sleep);
        }

        $locker->unlockProcess();

        return 0;
    }


    protected function returnTickets(){
        DB::beginTransaction();

        try{
            foreach ($this->getReturnList() as $transactionId => $returnStatusTicket) {

                $this->processTicket($transactionId);
            }

            DB::commit();
        }catch (\PDOException $e){
            DB::rollBack();

            throw $e;
        }catch (\Exception $e){

            throw $e;
        }
    }


    protected function getReturnList(){
        $ret = [];
        $list = SaleRailwayTicketReturn::whereIn('status', [SaleRailwayTicketReturn::STATUS_NOT_CHECKED, SaleRailwayTicketReturn::STATUS_QUEUED, SaleRailwayTicketReturn::STATUS_PROCESSING,
            SaleRailwayTicketReturn::STATUS_SUCCEEDED])->get();

        foreach ($list as $returnTicket){
            $ret[$returnTicket->transaction_id] = $returnTicket;
        }

        return $ret;
    }


    public function processTicket($transactionId){
        try {
            /** @var StatusResponse $ktjResult */
            $ktjResult = $this->ktjService
                ->getReturnETicketService()
                ->statusAuthorized(
                    new StatusRequest($transactionId)
                );
            foreach ($ktjResult->getReturnResult()->getTickets() as $ktjTicket) {
                /** @var null|SaleRailwayTicket $ticket */
                $ticket = SaleRailwayTicket::where('express_id', '=', $ktjTicket->getExpressID())->first();

                $ticket->status_id = $this->getLocalStatusFromApiStatus($ktjResult->getReturnRequestStatus());
                $ticket->save();

                $return_ticket = $this->getReturnTicket($ticket);
                $return_ticket->amount = $ktjTicket->getRetTariff();
                $return_ticket->commission = $ktjTicket->getRetCommissionTariff();

                //ofd returns null for FiscalizationInfo
                if ($ktjTicket->getFiscalizationInfo() != null && $ktjTicket->getFiscalizationInfo()->getPaymentNumber() != null) {
                    $return_ticket->payment_number = $ktjTicket->getFiscalizationInfo()->getPaymentNumber();
                }


                $return_ticket->krs = $ktjTicket->getKRS();
                $return_ticket->fks = $ktjTicket->getFKSNumber();

                $return_ticket->returned_at = $ktjResult->getReturnResult()->getOperationDateTime();
                $return_ticket->status = $ktjResult->getReturnRequestStatus();
                $return_ticket->reject_error_code = $ktjResult->getRejectInfo() instanceof RejectInfo ? $ktjResult->getRejectInfo()->getError() : null;
                # We override this field, because getReturnTicket method may return new entity
                $return_ticket->transaction_id = $transactionId;
                $return_ticket->save();

                # Make banking return transaction api call if return request status is applied
                if ($ktjResult->getReturnRequestStatus() == 5) {

                    $amount = $ktjTicket->getRetTariff();

                    $balanceUpdateForm = new BalanceUpdateForm(TransactionInterface::ACTION_ADD);
                    $balanceUpdateForm->setActionSum($amount);

                    $orderId = (string)$ticket->getReservation->reservation_id;
                    $balanceUpdateForm->setOrderNumber($orderId);
                    $agent = $ticket->getReservation->getReservation->agent;
                    $this->balanceUtils->processTransaction($agent, $balanceUpdateForm);

                }
            }
            # Apply return status
            switch ($ktjResult->getReturnRequestStatus()) {
                case SaleRailwayTicketReturn::STATUS_SUCCEEDED:
                    $applySuccessRequest = new ApplySuccessRequest();
                    $applySuccessRequest->setReturnRequest(new ReturnRequest($transactionId));
                    $applySuccessRequest->setRefunds(new ArrayCollection(array_map(function (\App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnReport\Status\Ticket $api_ticket) {
                        $applyReturnStatusRefundQuery = new Refund();
                        $applyReturnStatusRefundQuery->setAmount($api_ticket->getRetTariff());

                        //ofd returns null for FiscalizationInfo
                        if ($api_ticket->getFiscalizationInfo() != null && $api_ticket->getFiscalizationInfo()->getPaymentNumber() != null) {
                            $applyReturnStatusRefundQuery->setPaymentNumber($api_ticket->getFiscalizationInfo()->getPaymentNumber());
                        }else{
                            $applyReturnStatusRefundQuery->setPaymentNumber(0);
                        }

                        $applyReturnStatusRefundQuery->setRequisite($api_ticket->getExpressID());
                        $applyReturnStatusRefundQuery->setTerminal($this->ktjService->getKtjTerminal());

                        $applyReturnStatusRefundQuery->setSignature($this->getRefundSignature($applyReturnStatusRefundQuery));

                        return $applyReturnStatusRefundQuery;
                    }, $ktjResult->getReturnResult()->getTickets()->toArray())));
                    $this->ktjService->getReturnETicketService()->applySuccessAuthorized(
                        $applySuccessRequest
                    );
                    break;
                case SaleRailwayTicketReturn::STATUS_REJECTED:
                case SaleRailwayTicketReturn::STATUS_ERROR:
                    $applyFailRequest = new ApplyFailRequest();
                    $applyFailRequest->setReturnOperationTransactionId($transactionId);

                    $this->ktjService->getReturnETicketService()->applyFailAuthorized(
                        $applyFailRequest
                    );
                    break;
            }

        } catch (ClientException $exception) {
            /* Do something */

            //throw $exception;
        }
    }


    protected function getRefundSignature(Refund $refund): ?string
    {
        $signatureRequest = new SignatureRequest();

        $signatureRequest->setTerminal($this->ktjService->getKtjTerminal());
        $signatureRequest->setAmount($refund->getAmount());
        $signatureRequest->setRequisite($refund->getRequisite());
        $signatureRequest->setPaymentNumber($refund->getPaymentNumber());
        $signatureRequest->setSignature(null);


        /**@var Signature $signature*/
        $signature = App::make(Signature::class);

        /**@var SerializerInterface $serializer*/
        $serializer = App::make(SerializerInterface::class);

        return $signature->sign($serializer->serialize(
            $signatureRequest,
            'json',
            SerializationContext::create()->setSerializeNull(true)
        ));
    }

    /**
     * Apply ticket status
     *
     * @param        $return_status
     *
     * @return null|integer
     */
    protected function getLocalStatusFromApiStatus($return_status)
    {
        $data = [
            SaleRailwayTicketReturn::STATUS_QUEUED => ReservationStatus::RESERVATION_RETURNING,
            SaleRailwayTicketReturn::STATUS_PROCESSING => ReservationStatus::RESERVATION_RETURNING,
            SaleRailwayTicketReturn::STATUS_REJECTED => ReservationStatus::RESERVATION_RETURN_ERROR,
            SaleRailwayTicketReturn::STATUS_SUCCEEDED => ReservationStatus::RESERVATION_RETURNED,
            SaleRailwayTicketReturn::STATUS_APPLIED => ReservationStatus::RESERVATION_RETURNED,
            SaleRailwayTicketReturn::STATUS_ERROR => ReservationStatus::RESERVATION_RETURN_ERROR
        ];

        return ArrayHelper::getValue($data, $return_status);
    }

    /**
     * Get ReturnTicket entity
     * If no entity found, will return new entity
     *
     * @param SaleRailwayTicket $ticket
     *
     * @return null|object|SaleRailwayTicketReturn
     */
    protected function getReturnTicket(SaleRailwayTicket $ticket)
    {
        $returnTicket = SaleRailwayTicketReturn::where('ticket_id', '=', $ticket->id)->first();

        if (null == $returnTicket) {
            $returnTicket = new SaleRailwayTicketReturn();
        }

        return $returnTicket;
    }
}
