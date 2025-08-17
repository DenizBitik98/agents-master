<?php


namespace App\Http\Requests;


use App\Models\SaleRailwayStation;
use Illuminate\Foundation\Http\FormRequest;

class RailwayRequestBase extends FormRequest
{
    protected function findStationByCode(?string $code=null){
        if($code == null){
            return null;
        }
        return SaleRailwayStation::where('station_code', '=', $code)->first();
    }
}
