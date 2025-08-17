<?php


namespace App\Http\Requests\Order;


use App\Http\Requests\RailwayRequestBase;
use App\ViewModels\Sale\Order\FilterOrderForm;

class FilterOrderRequest extends RailwayRequestBase
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

        $rules = [];

        return $rules;
    }

    /**
     * @return FilterOrderForm|null
     */
    public function getData() : ?FilterOrderForm {
        $ret = new FilterOrderForm();

        if($this->isMethod($this::METHOD_POST)){
            $ret->setOrderNumber($this->input('searchForm.orderNumber'));
            $ret->setTicketNumber($this->input('searchForm.ticketNumber'));
            $ret->setStatus($this->input('searchForm.status'));
            $ret->setIin($this->input('searchForm.iin'));
            $ret->setDocumentNumber($this->input('searchForm.documentNumber'));
            $ret->setPassengerFirstName($this->input('searchForm.passengerFirstName'));
            $ret->setPassengerName($this->input('searchForm.passengerName'));

            $ret->setDepartureStationCode($this->input('searchForm.departureStationCode'));
            $ret->setDepartureStation($this->findStationByCode($ret->getDepartureStationCode()));

            $ret->setArrivalStationCode($this->input('searchForm.arrivalStationCode'));
            $ret->setArrivalStation($this->findStationByCode($ret->getArrivalStationCode()));

            $ret->setOrderDateFrom($this->date('searchForm.orderDateFrom'));
            $ret->setOrderDateTo($this->date('searchForm.orderDateTo'));
            $ret->setDepartureDateFrom($this->date('searchForm.departureDateFrom'));
            $ret->setDepartureDateTo($this->date('searchForm.departureDateTo'));
            $ret->setUserName($this->input('searchForm.userName'));
            $ret->setAgentId($this->input('searchForm.agentId'));
            $ret->setDataTypes($this->input('searchForm.dataType'));
        }

        return $ret;
    }


}
