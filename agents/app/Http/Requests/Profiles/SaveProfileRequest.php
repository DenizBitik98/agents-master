<?php


namespace App\Http\Requests\Profiles;


use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;

class SaveProfileRequest extends FormRequest
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
        $rules['tariff_type'] = 'required';
        $rules['document_type_id'] = 'required';
        $rules['document'] = 'required';
        $rules['surname'] = 'required|max:255';
        $rules['name'] = 'required|max:255';
        //$rules['passenger_iin'] = 'required|max:255';
        $rules['birthday'] = 'required';
        $rules['sex'] = 'required';
        $rules['phone'] = 'required';
        $rules['citizenship_id'] = 'required';
        //$rules['external_id'] = 'required|max:255';
        //$rules['note'] = 'required|max:500';
        //$rules['agent_id'] = 'required';


        return $rules;
    }

    public function bind(Profile $profile){
        $profile->tariff_type = $this->input('tariff_type');
        $profile->document_type_id = $this->input('document_type_id');
        $profile->document = $this->input('document');
        $profile->surname = $this->input('surname');
        $profile->name = $this->input('name');
        $profile->last_name = $this->input('last_name');
        $profile->passenger_iin = $this->input('passenger_iin');
        $profile->birthday = $this->date('birthday');
        $profile->sex = $this->input('sex');
        $profile->phone = $this->input('phone');
        $profile->citizenship_id = $this->input('citizenship_id');
        $profile->external_id = $this->input('external_id');
        $profile->note = $this->input('note');
        //$profile->agent_id = $this->input('agent_id');

        return $profile;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Заполните',
            '*.unique' => 'Должно быть уникальным',
        ];
    }
}
