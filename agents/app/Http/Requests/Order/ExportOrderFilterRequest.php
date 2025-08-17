<?php


namespace App\Http\Requests\Order;


use App\Http\Requests\RailwayRequestBase;
use App\ViewModels\Sale\Order\ExportFilterOrderForm;

class ExportOrderFilterRequest extends RailwayRequestBase
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
     * @return ExportFilterOrderForm|null
     */
    public function getData() : ?ExportFilterOrderForm {
        $ret = new ExportFilterOrderForm();

        if($this->isMethod($this::METHOD_POST)){

            $ret->setDateFrom($this->date('searchForm.dateFrom'));
            $ret->setDateTo($this->date('searchForm.dateTo'));
            $ret->setExportBuy($this->boolean('searchForm.exportBuy', false));
            $ret->setExportReturn($this->boolean('searchForm.exportReturn', false));
            $ret->setAgentId($this->input('searchForm.agentId'));
        }

        return $ret;
    }
}
