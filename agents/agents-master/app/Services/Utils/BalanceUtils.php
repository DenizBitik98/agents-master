<?php


namespace App\Services\Utils;


use App\AppModels\Balance\CurrentBalanceModel;
use App\AppModels\Balance\TransactionInterface;
use App\Models\Agent;
use App\Models\BalanceTransaction;
use Illuminate\Support\Facades\DB;

class BalanceUtils
{
    /**
     * @param Agent $agent
     * @return CurrentBalanceModel
     */
    public function getCurrentBalance(Agent $agent): CurrentBalanceModel
    {
        $current = new CurrentBalanceModel();

        $lastTransaction = $this
            ->getLastTransaction($agent);

        if ($lastTransaction) {
            $current
                ->setBalance($lastTransaction->balance)
                ->setDate($lastTransaction->action_date);
        }

        return $current;
    }

    /**
     * @param Agent $agent
     * @return BalanceTransaction|null
     */
    public function getLastTransaction(Agent $agent) : ?BalanceTransaction
    {
        return BalanceTransaction::where('agent_id',  '=',  $agent->id)

            ->orderBy('id', 'desc')
            ->first();
    }

    public function processTransaction(Agent $agent, TransactionInterface $transaction): void
    {
        if (!$transaction->getActionSum()) {
            return;
        }


        DB::beginTransaction();
        try{
            $lastTransaction = $this
                ->getLastTransaction($agent);

            $balance = 0;

            if ($lastTransaction) {
                $balance = $lastTransaction->balance;
            }

            switch ($transaction->getActionType()) {
                case TransactionInterface::ACTION_ADD:
                    $balance += $transaction->getActionSum();
                    break;

                case TransactionInterface::ACTION_SUB:
                    $balance -= $transaction->getActionSum();
                    break;

                default:
                    break;
            }

            $balanceTransaction = new BalanceTransaction();

            $balanceTransaction->agent_id = $agent->id;
            $balanceTransaction->action_type = $transaction->getActionType();
            $balanceTransaction->action_date = new \DateTime();
            $balanceTransaction->action_sum = (float)($transaction->getActionSum());
            $balanceTransaction->balance = (float)($balance);
            $balanceTransaction->order_number = $transaction->getOrderNumber();
            $balanceTransaction->comment = $transaction->getComment();

            $balanceTransaction->save();

            $agent->current_balance = (float)($balance);
            $agent->save();


            DB::commit();
        }
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();

            throw $e;

        }
    }

    public function isValidActionType($actionType): bool
    {
        return in_array(
            $actionType,
            [TransactionInterface::ACTION_SUB, TransactionInterface::ACTION_ADD],
            true
        );
    }
}
