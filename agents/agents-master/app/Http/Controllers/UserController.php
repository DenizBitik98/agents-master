<?php


namespace App\Http\Controllers;


use App\Http\Requests\User\ChangePasswordToUserRequest;
use App\Http\Requests\User\SaveEditUserRequest;
use App\Http\Requests\User\SaveUserRequest;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function list(Request $request)
    {
        $agent = $this->getAgent();
        if ($agent == null) {
            $agentId = $request->get('agentId');
            $agent = Agent::find($agentId);
        }

        $list = User::where('agent_id', '=', $agent->id)->get();

        return view('user.list', [
            'list' => $list,
            'agent' => $agent
        ]);
    }

    public function create(Request $request)
    {
        $user = new User();

        $agent = $this->getAgent();
        if ($agent == null){
            $agentId = $request->get('agentId');
            $agent = Agent::find($agentId);
        }

        $user->agent_id = $agent->id;

        return view('user.create', [
            'user' => $user
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(Request $request)
    {

        $user = new User();

        if($request->get('id') > 0){
            $user = User::find($request->get('id'));
        }


        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function saveEditUser(SaveEditUserRequest $request)
    {
        $user = new User();

        $id = $request->get('id');

        if($id > 0){
            $user = User::find($id);
        }

        $agentId = $request->input('agent_id');
        $user->name = $request->input('name');
        $user->fio = $request->input('fio');
        $user->email = $request->input('email');


        $agent = $this->getAgent();
        if ($agent != null){
            $agentId = $agent->id;
        }

        $user->agent_id = $agentId;

        if($user->id == null || trim($user->password) != ''){
            $user->password = Hash::make($request->input('password'));
        }

        $role = $request->input('role');

        if(!in_array($role, [User::ROLE_AGENT, User::ROLE_AGENT_ADMIN])){
            $role = User::ROLE_AGENT;
        }
        $user->role = $role;

        $user->save();

        return redirect(route('userList', ['agentId'=>$agentId]));
    }

    public function store(SaveUserRequest $request)
    {
        $user = new User();

        $id = $request->get('id');

        if($id > 0){
            $user = User::find($id);
        }

        $agentId = $request->input('agent_id');
        $user->name = $request->input('name');
        $user->fio = $request->input('fio');
        $user->email = $request->input('email');


        $agent = $this->getAgent();
        if ($agent != null){
            $agentId = $agent->id;
        }

        $user->agent_id = $agentId;

        if($user->id == null || trim($user->password) != ''){
            $user->password = Hash::make($request->input('password'));
        }

        $role = $request->input('role');

        if(!in_array($role, [User::ROLE_AGENT, User::ROLE_AGENT_ADMIN])){
            $role = User::ROLE_AGENT;
        }
        $user->role = $role;

        $user->save();

        return redirect(route('userList', ['agentId'=>$agentId]));
    }

    public function blockUser(Request $request)
    {
        $user = new User();

        $id = $request->get('id');

        if($id > 0){
            $user = User::find($id);
        }

        $user->is_blocked = true;

        $user->save();

        return redirect(route('userList', ['agentId'=>$user->agent_id]));
    }

    public function unBlockUser(Request $request)
    {
        $user = new User();

        $id = $request->get('id');

        if($id > 0){
            $user = User::find($id);
        }

        $user->is_blocked = false;

        $user->save();

        return redirect(route('userList', ['agentId'=>$user->agent_id]));
    }

    /*пароль*/
    public function changePasswordToUser(Request $request)
    {
        $user = new User();

        $id = $request->get('id');

        if($id > 0){
            $user = User::find($id);
        }

        return view('user.changePasswordToUser', [
            'user' => $user
        ]);
    }

    public function changePasswordToUserSave(ChangePasswordToUserRequest $request)
    {
        if($request->isMethod($request::METHOD_POST)){

            $user = null;

            $id = $request->get('id');

            if($id > 0){
                $user = User::find($id);
            }

            if(!($user instanceof User)){
                return;
            }

            $newPassword = trim($request->get('newPassword'));

            $user->password = Hash::make($newPassword);

            $user->save();

            return redirect(route('userList', ['agentId'=>$user->agent_id]));
        }


    }




    /**
     * @return Agent
     */
    protected function getAgent(){
        $agentId = Auth::user()->agent_id;
        $agent = Agent::find($agentId);

        return $agent;
    }
}
