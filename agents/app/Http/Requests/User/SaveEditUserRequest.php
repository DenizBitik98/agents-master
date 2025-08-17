<?php


namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SaveEditUserRequest extends FormRequest
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
        $rules['email'] = 'required|max:255|email|unique:users,email,'.intval($this->get('id'));
        $rules['name'] = 'required|max:255|unique:users,name,'.intval($this->get('id'));
        $rules['fio'] = 'required';
        $rules['role'] = 'required';

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Заполните',
            '*.unique' => 'Должно быть уникальным',
            '*.email' => 'Некоректная почта',
            '*.same' => 'Пароли не совападают',
            '*.min' => 'Должно быть не меньше 8',
        ];
    }
}
