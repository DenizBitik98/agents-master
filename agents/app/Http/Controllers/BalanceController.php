<?php

namespace App\Http\Controllers;

use App\AppModels\Balance\BalanceUpdateForm;
use App\Http\Requests\BalanceTransactionStoreRequest;
use App\Models\Agent;
use App\Models\BalanceTransaction;
use App\Models\User;
use App\Services\Utils\BalanceUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BalanceController extends Controller
{
    /**
     * @var null | BalanceUtils
     */
    protected $balanceUtils = null;

    public function __construct(BalanceUtils $balanceUtils)
    {
        $this->balanceUtils = $balanceUtils;

        $this->middleware('auth');

    }

    public function agentBalanceListAdmin(Request $request){
        if(Auth::user()->role != User::ROLE_ADMIN){
            throw new \Exception();
        }


        $agentId = $request->get('agentId');
        $agent = Agent::find($agentId);

        $list = BalanceTransaction::where('agent_id', '=', $agentId)
            ->orderByDesc('id')
            ->get();

        return view('balance.agent', [
            'agent' => $agent,
            'list' => $list,
        ]);
    }


    public function transaction(BalanceTransactionStoreRequest $request)
    {
        if(Auth::user()->role != User::ROLE_ADMIN){
            throw new \Exception();
        }

        $agentId = $request->get('agentId');

        $actionType = $request->get('actionType');
        $agent = Agent::find($agentId);

        if (!$agent) {
            throw new NotFoundHttpException();
        }

        if (!$this->balanceUtils->isValidActionType($actionType)) {
            throw new NotFoundHttpException();
        }

        $error = false;

        if ($request->isMethod($request::METHOD_POST)) {
            try {
                $data = $request->getData();
                $data->setOrderNumber('Пополнение баланса');

                $this
                    ->balanceUtils
                    ->processTransaction($agent, $data);

                return redirect()->route('agentBalance', [
                    'agentId' => $agentId
                ]);

            } catch (\Exception $e) {
                $error = $e->getMessage();

                throw $e;
            }
        }

        return view('balance.transaction', [
            'agent'   => $agent,
            'agentId' => $agentId,
            'error'   => $error,
            'type'    => $actionType
        ]);
    }

    public function agentBalanceList(Request $request){
        $agentId = Auth::user()->agent_id;
        $agent = Agent::find($agentId);

        $list = BalanceTransaction::where('agent_id', '=', $agentId)
            ->orderByDesc('id')
            ->get();

        return view('balance.agent1', [
            'agent' => $agent,
            'list' => $list,
        ]);
    }

}
