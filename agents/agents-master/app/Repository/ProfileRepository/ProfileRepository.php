<?php

namespace App\Repository\ProfileRepository;

use App\Models\Profile;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ProfileRepository extends BaseRepository
{

    public function __construct(Profile $model)
    {
        parent::__construct($model);
    }

    //TODO переписать в eloquent
    public function getProfile($agentId)
    {
        return $this->query()->select('profiles.*', 'srd.name as document_name', 'c.name as country_name')
            ->leftJoin('sale_railway_document as srd', 'profiles.document_type_id', '=', 'srd.id')
            ->leftJoin('country as c', 'profiles.citizenship_id', '=', 'c.id')
            ->where('agent_id', '=', $agentId)
            ->orderBy('surname')
            ->get();
    }

    /**
     * @param $params
     * @return Builder
     */
    public function filter($params): Builder
    {
        $query = parent::query();

        if (isset($params['surname'])) {
            return $query->where('profiles.surname', 'ilike', "%".mb_strtoupper($params['surname'])."%");
            //return $query->where(DB:raw("UPPER(profiles.surname) like '%".mb_strtoupper($params['surname'])."%'"));
            //return $query->surname(mb_strtoupper($params['surname']));
        }

        if (isset($params['passenger_iin'])) {
          return $query->passengerIin($params['passenger_iin']);
        }
    }
}
