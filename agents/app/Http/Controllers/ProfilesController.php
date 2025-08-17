<?php


namespace App\Http\Controllers;


use App\Export\ProfilesExport;
use App\Http\Requests\Profiles\SaveProfileRequest;
use App\Models\Agent;
use App\Models\Country;
use App\Models\Profile;
use App\Models\SaleRailwayDocument;
use App\Repository\ProfileRepository\ProfileRepository;
use App\Services\Utils\SexUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProfilesController extends Controller
{
    /**
     * @var null | SexUtils
     */
    protected $sexUtils = null;
    /**
     * @var ProfileRepository $profileRepository
     */
    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->sexUtils = new SexUtils();
        $this->profileRepository = $profileRepository;
    }

    public function list(Request $request)
    {
        $agent = $this->getAgent();

        if($agent == null){
            throw new \Exception("агент не найден");
        }

        $profiles = $this->profileRepository->getProfile($agent->id);

        $export = $request->get('export', false);

        if($export != false){
            return Excel::download(new ProfilesExport($profiles), 'profiles.xlsx');
        }

        return view('profiles.list', [
            'list' => $profiles,
            'agent' => $agent
        ]);
    }

    public function create(Request $request)
    {
        $profile = new Profile();

        $agent = $this->getAgent();
        if($agent == null){
            throw new \Exception("агент не найден");
        }

        $profile->agent_id = $agent->id;

        $docTypes = SaleRailwayDocument::all();
        $countries = Country::all();
        $sexList = $this->sexUtils->getForForm();

        return view('profiles.create', [
            'profile' => $profile,
            'docTypes'=>$docTypes,
            'countries'=>$countries,
            'sexList'=>$sexList,
        ]);
    }

    public function store(SaveProfileRequest $request)
    {
        $profile = new Profile();

        $id = $request->get('id');

        if($id > 0){
            $profile = Profile::find($id);
        }

        $agent = $this->getAgent();
        if ($agent == null){
            throw new \Exception("агент не найден");
        }

        $request->bind($profile);
        $profile->agent_id = $agent->id;

        $profile->save();
        return redirect(route('profileList'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function edit(Request $request)
    {

        $id = $request->get('id');

        $profile = Profile::find($id);

        $agent = $this->getAgent();
        if($agent == null || $agent->id != $profile->agent_id){
            throw new \Exception("агент не найден");
        }

        $profile->agent_id = $agent->id;

        $docTypes = SaleRailwayDocument::all();
        $countries = Country::all();
        $sexList = $this->sexUtils->getForForm();

        return view('profiles.create', [
            'profile' => $profile,
            'docTypes'=>$docTypes,
            'countries'=>$countries,
            'sexList'=>$sexList,
        ]);
    }

    public function searchProfiles(Request $request)
    {

        $query = <<<EOL
select p.*, srd.dcts_code as document_dcts_code,
       c.dcts_code as country_dcts_code,
       concat(p.surname, ' ', p.name, ' ', coalesce(p.last_name, ''), ' ', srd.name, ' ', p.document) as value
from profiles p
left join sale_railway_document srd on p.document_type_id = srd.id
left join country c on p.citizenship_id = c.id
EOL;
        $agent = $this->getAgent();
        if($agent == null){
            throw new \Exception("агент не найден");
        }
        $query .= " where p.agent_id = ".$agent->id." and UPPER(p.surname) like '%".mb_strtoupper($request->get('term'))."%'";

        $profiles = DB::select( DB::raw($query) );

        return response()->json($profiles);
    }

    public function searchProfilesNew(Request $request)
    {
        $agent = $this->getAgent();
        $profiles = $this->profileRepository->filter($request->all())
            ->where('agent_id', '=', $agent->id)
            ->get();

        return view('profiles.list', [
            'list' => $profiles,
            'agent' => $agent
        ]);
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
