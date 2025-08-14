<?php


namespace App\Http\Requests\Railway;

use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\CarSearchRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\DepDate;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Direction;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Search\Seat\Train;
use App\Models\SaleRailwayStation;
use App\ViewModels\Sale\Railway\Train\SearchModel;
use Illuminate\Foundation\Http\FormRequest;

class SearchCarRequest extends FormRequest
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
            //
        ];
    }

    /**
     * @return SearchModel
     */
    public function getData() : CarSearchRequest{

        $carSearchRequest = new CarSearchRequest();

        $carSearchRequest->setStationFrom($this->input("carSearch.forwardDirection.stationFrom"));
        $carSearchRequest->setStationTo($this->input("carSearch.forwardDirection.stationTo"));
        $carSearchRequest->setShowWithoutPlaces(false);

        $forwardDepDate = $this->date("carSearch.forwardDirection.depDate");

        $direction = new Direction();
        $direction->setType(Direction::TYPE_FORWARD);
        $direction->setDepDate(new DepDate($forwardDepDate));
        $direction->setDepTime($forwardDepDate);
        $direction->setTrain(new Train($this->input("carSearch.forwardDirection.train")));
        $carSearchRequest->setForwardDirection($direction);

        if($this->input("carSearch.backwardDirection.stationFrom") != ''){

            $backwardDepDate = $this->date("carSearch.backwardDirection.depDate");
            $direction = new Direction();
            $direction->setType(Direction::TYPE_BACKWARD);
            $direction->setDepDate(new DepDate($backwardDepDate));
            $direction->setDepTime($backwardDepDate);
            $direction->setTrain(new Train($this->input("carSearch.backwardDirection.train")));

            $carSearchRequest->setBackwardDirection($direction);
        }

        return $carSearchRequest;
    }

    /**
     * @return \Illuminate\Support\Carbon|null
     */
    public function getForwardDetDate(){
        return $this->date("carSearch.forwardDirection.depDate");
    }

    /**
     * @return mixed
     */
    public function getStationFrom(){
        return $this->input("carSearch.forwardDirection.stationFrom");
    }

    /**
     * @return mixed
     */
    public function getStationTo(){
        return $this->input("carSearch.forwardDirection.stationTo");
    }

    public function getIsObligativeElReg(){
        return $this->input("carSearch.forwardDirection.isObligativeElReg") == 1 ||
            $this->input("carSearch.backwardDirection.isObligativeElReg") == 1;
    }

}
