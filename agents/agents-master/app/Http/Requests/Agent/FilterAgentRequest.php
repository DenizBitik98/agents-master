<?php


namespace App\Http\Requests\Agent;
use Illuminate\Foundation\Http\FormRequest;

use App\ViewModels\Agent\FilterAgentForm;

class FilterAgentRequest  extends FormRequest
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

    public function getData() : ?FilterAgentForm {
        $ret = new FilterAgentForm();

        if($this->isMethod($this::METHOD_POST)){

            $ret->setCompanyName($this->input('searchForm.company_name'));
            $ret->setAddress($this->input('searchForm.address'));
            $ret->setEmail($this->input('searchForm.email'));
            $ret->setBin($this->input('searchForm.bin'));
            $ret->setIsBlocked($this->input('searchForm.is_blocked'));
        }

        return $ret;
    }


}
