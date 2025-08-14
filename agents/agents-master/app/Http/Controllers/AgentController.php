<?php

namespace App\Http\Controllers;

use App\Http\Requests\Agent\ChangeSettingsRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Export\AgentsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Agent\FilterAgentRequest;

/**
 * Class AgentController
 * @package App\Http\Controllers
 */
class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(FilterAgentRequest $request)
    {
        if(Auth::user()->role != User::ROLE_ADMIN){
            throw new \Exception();
        }

        $filterModel = $request->getData();
		
        $limit = 10;
        $page = $request->get('page', 1);
        $offset = ($page - 1) * $limit;

        $query = <<<EOL
select *
from agents
where 1=1
EOL;

        $export = false;
        $showFilter = '0';
        if ($request->isMethod($request::METHOD_POST)) {


            if ($filterModel->getCompanyName() != '') {
                $query .= ' and LOWER(company_name) like  \'%'.mb_strtolower($filterModel->getCompanyName()).'%\'';
            }
            if ($filterModel->getAddress() != '') {
                $query .= ' and LOWER(address) like  \'%'.mb_strtolower($filterModel->getAddress()).'%\'';
            }
            if ($filterModel->getEmail() != '') {
                $query .= ' and LOWER(email) like  \'%'.mb_strtolower($filterModel->getEmail()).'%\'';
            }
            if ($filterModel->getBin() != '') {
                //$query .= ' and bin = \'' . $filterModel->getBin() . '\'';
                $query .= ' and bin like \'%' . $filterModel->getBin() . '%\'';			
            }
            /*if ($filterModel->getIsBlocked() != '') {
                $query .= ' and is_blocked like \'%' . $filterModel->getIsBlocked() . '%\'';
            }*/
            if ($request->input('is_blocked1') != "") {			
				if ($request->input('is_blocked1') == 0) {
					$query .= ' and not is_blocked';
				} 
				elseif ($request->input('is_blocked1') == 1) {
					$query .= ' and is_blocked';
				} 	
				elseif ($request->input('is_blocked1') == 2) {
					$query .= ' and is_blocked IS NULL';
				} 				
            }			
            $export = $request->get('export', false);
            $showFilter = '1';
			
			$request->flash();
        }
	    $count = DB::selectOne( DB::raw('select count(*) from ('.$query.') a'), [], true );

        if ($export != false) {
			
        $query1 = <<<EOL
select srd.*, p.company_name as company_name1,
		p.phone_number as phone_number1,	   
		p.address as address1,
		p.email as email1,		   
		p.commission as commission1,
		p.bin as bin1,		   
		p.nds as nds1,
		p.is_blocked as is_blocked1 	
from agents p
inner join users srd on p.id = srd.agent_id
EOL;

        if ($request->isMethod($request::METHOD_POST)) {

            if ($filterModel->getCompanyName() != '') {
                $query1 .= ' and LOWER(company_name) like  \'%'.mb_strtolower($filterModel->getCompanyName()).'%\'';
            }
            if ($filterModel->getAddress() != '') {
                $query1 .= ' and LOWER(address) like  \'%'.mb_strtolower($filterModel->getAddress()).'%\'';
            }
            if ($filterModel->getEmail() != '') {
                $query1 .= ' and LOWER(email) like  \'%'.mb_strtolower($filterModel->getEmail()).'%\'';
            }
            if ($filterModel->getBin() != '') {
                $query1 .= ' and bin like \'%' . $filterModel->getBin() . '%\'';		
            }
            if ($request->input('is_blocked1') != "") {			
				if ($request->input('is_blocked1') == 0) {
					$query1 .= ' and not p.is_blocked';
				} 
				elseif ($request->input('is_blocked1') == 1) {
					$query1 .= ' and p.is_blocked';
				} 
				elseif ($request->input('is_blocked1') == 2) {
					$query1 .= ' and p.is_blocked IS NULL';
				} 					
            }	
			$request->flash();			
        }
	
            $profiles = DB::select( DB::raw($query1) );
            return Excel::download(new AgentsExport($profiles), 'agents.xlsx');
        } else {
			$query .= 'ORDER BY id DESC';	
            $agents = DB::select(DB::raw($query . ' limit ' . $limit . ' offset ' . $offset));
        }

        return view('agents.list', [
            'agents' => collect($agents)->sortBy('id')->reverse()->toArray(),
            'agents' => $agents,			
            'count'=>$count,
            'limit'=>$limit,
            'offset'=>$offset,
            'page'=>$page,
            'route'=>'orders',
            'filterModel'=>$filterModel,
            'showFilter'=>$showFilter,

        ]);
    }


    public function create($id=0)
    {

        $agent = new Agent();

        if($id > 0){
            $agent = Agent::find($id);
        }

        return view('agents.create', [
            'agent' => $agent
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(Request $request): View
    {

        $agent = new Agent();

        if($request->get('id') > 0){
            $agent = Agent::find($request->get('id'));
        }


        return view('agents.edit', [
            'agent' => $agent
        ]);
    }


    public function store(Request $request)
    {
        $agent = new Agent();
        $agent->current_balance = 0;

        $id = $request->get('id');

        if($id > 0){
            $agent = Agent::find($id);
        }

        $agent->name = "";
        $agent->company_name = $request->input('companyName');
        $agent->phone_number = $request->input('phoneNumber');
        $agent->address = $request->input('address');
        $agent->commission = $request->input('commission');
        $agent->email = $request->input('agent_email');
        $agent->bin = $request->input('bin');
        $agent->nds = $request->input('nds');
        $agent->contract_number = $request->input('contract_number');
        if ($request->input('paytype') == "") {
            $agent->pay_type = "cashless";
        } else {
            $agent->pay_type = $request->input('paytype');
        }


        $agent->save();

        return redirect('agents');
    }

    public function blockAgent(Request $request)
    {
        $user = new Agent();

        $id = $request->get('id');

        if($id > 0){
            $user = Agent::find($id);
        }

        $user->is_blocked = true;

        $user->save();

        return redirect('agents');
    }

    public function unBlockAgent(Request $request)
    {
        $user = new Agent();

        $id = $request->get('id');

        if($id > 0){
            $user = Agent::find($id);
        }

        $user->is_blocked = false;

        $user->save();

        return redirect('agents');
    }


    public function changePassword(Request $request){

        $isSuccess = false;
        return view('user.changePassword', ['isSuccess'=>$isSuccess]);
    }

    public function changePasswordSave(ChangePasswordRequest $request){

        $isSuccess = false;
        if($request->isMethod($request::METHOD_POST)){
            $currentPassword = $request->get('currentPassword');
            $user = Auth::user();
            $newPassword = trim($request->get('newPassword'));
            $repeatNewPassword = trim($request->get('repeatNewPassword'));

            if(Hash::check($currentPassword, $user->getAuthPassword())
                && $newPassword == $repeatNewPassword
            ){

                $user->password = Hash::make($newPassword);

                $user->save();

                $isSuccess = true;
            }else{
                Session::flash('error', "Неправильно введен пароль");
            }
        }
        return view('user.changePassword', ['isSuccess'=>$isSuccess]);
    }

    public function changeSettings(Request $request){

        $isSuccess = false;
        $user = Auth::user();
        $agent = Agent::find($user->agent_id);
        $commission = $agent->own_commission;

        return view('agents.settings', ['isSuccess'=>$isSuccess, 'commission'=>$commission]);
    }

    public function changeSettingsSave(ChangeSettingsRequest $request){

        $isSuccess = false;
        $user = Auth::user();
        $agent = Agent::find($user->agent_id);
        $commission = $agent->own_commission;

        if($request->isMethod($request::METHOD_POST)){

            $commission = $request->get('commission');

            $agent->own_commission = $commission;
            $agent->save();

            $isSuccess = true;
        }

        return view('agents.settings', ['isSuccess'=>$isSuccess, 'commission'=>$commission]);
    }


}
