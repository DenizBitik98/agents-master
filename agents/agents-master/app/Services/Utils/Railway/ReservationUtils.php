<?php


namespace App\Services\Utils\Railway;


use App\AppModels\Balance\BalanceUpdateForm;
use App\AppModels\Balance\TransactionInterface;
use App\Models\Agent;
use App\Models\Reservation;
use App\Models\SaleRailwayReservation;
use App\Models\SaleRailwayTicket;
use App\Services\Utils\BalanceUtils;

class ReservationUtils
{
    const BUY_RESULT_OK = 1;
    const BUY_RESULT_NOT_ENOUGH_MONEY = -1;
    const BUY_RESULT_UNKNOWN_ERROR = -2;


    /**
     * @var null | BalanceUtils
     */
    protected $balanceUtils = null;

    public function __construct(BalanceUtils $balanceUtils)
    {
        $this->balanceUtils = $balanceUtils;
    }

    function calcTicketsCostSum(Reservation $reservation, $precision=2){
        $ret = 0;

        /**
         * @var $rwReservation SaleRailwayReservation
         */
        foreach ($reservation->getRailwayReservationsRelations as $rwReservation){
            /**
             * @var SaleRailwayTicket $ticket
             */
            foreach ($rwReservation->getRelatedTickets as $ticket){
                $ret += $ticket->getTotalCostWithAgentCommission();
            }
        }


        return number_format((float) $ret, $precision, '.', '');
    }

    function buy(Reservation $reservation, Agent $agent) : int {
        $cost = 0;

        try{
            /**
             * @var $rr SaleRailwayReservation
             */
            foreach ($reservation->getRailwayReservationsRelations as $rr){
                //$cost += $rr->agents_own_commission;
                /**
                 * @var $ticket SaleRailwayTicket
                 */
                foreach ($rr->getRelatedTickets as $ticket){
                    $cost += $ticket->getTotalCostWithAgentCommission();
                }
            }


            $currentBalance = $this->balanceUtils->getCurrentBalance($agent);

            if($currentBalance->getBalance() > $cost){
                $balanseUpdateForm = new BalanceUpdateForm(TransactionInterface::ACTION_SUB);
                $balanseUpdateForm->setActionSum($cost);
                $orderId = (string)$reservation->id;
                $balanseUpdateForm->setOrderNumber($orderId);
                $this->balanceUtils->processTransaction($agent, $balanseUpdateForm);

                return ReservationUtils::BUY_RESULT_OK;
            }else{
                return ReservationUtils::BUY_RESULT_NOT_ENOUGH_MONEY;
            }
        }catch (\Exception $e){

        }

        return ReservationUtils::BUY_RESULT_UNKNOWN_ERROR;
    }


}
