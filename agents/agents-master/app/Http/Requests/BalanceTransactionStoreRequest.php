<?php

namespace App\Http\Requests;

use App\AppModels\Balance\BalanceUpdateForm;
use Illuminate\Foundation\Http\FormRequest;

class BalanceTransactionStoreRequest extends FormRequest
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

    public function getData() : BalanceUpdateForm{
        $ret = new BalanceUpdateForm();

        $ret->setActionSum($this->input('actionSum'));
        $ret->setActionType($this->input('actionType'));
        $ret->setComment($this->input('comment'));

        return $ret;
    }
}
