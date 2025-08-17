<?php


namespace App\Http\Requests\Railway;

use App\Models\SaleRailwayStation;
use App\ViewModels\Sale\Railway\Train\SearchModel;
use Illuminate\Foundation\Http\FormRequest;

class SearchTrainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'departureStationCode'=>'required',
            'arrivalStationCode'=>'required',
            'departureDate'=>'required',
            //'backwardDate'=>'after_or_equal:departureDate'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Заполните'
        ];
    }

    /**
     * @return SearchModel
     */
    public function getData() : SearchModel{
        $searchModel = new SearchModel();

        $searchModel->setDepartureStationCode($this->input('departureStationCode'));
        $searchModel->setArrivalStationCode($this->input('arrivalStationCode'));
        $searchModel->setDepartureDate($this->date('departureDate'));
        $searchModel->setBackwardDate($this->date('backwardDate'));
        $searchModel->setCarType($this->get('carType'));
        $searchModel->setDayShift($this->get('dayShift'));

        if($searchModel->getDepartureStationCode() != null){
            $searchModel->setDepartureStation($this->findStationByCode($searchModel->getDepartureStationCode()));
        }

        if($searchModel->getArrivalStationCode() != null){
            $searchModel->setArrivalStation($this->findStationByCode($searchModel->getArrivalStationCode()));
        }

        return $searchModel;
    }

    protected function findStationByCode(string $code){
        return SaleRailwayStation::where('station_code', '=', $code)->first();
    }
}
