<?php


namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SaveUserRequest extends FormRequest
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
        $rules = [
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised()
            ],
        ];
        $rules['email'] = 'required|unique:users|max:255|email';
        $rules['name'] = 'required|unique:users|max:255';
        $rules['fio'] = 'required';
        $rules['role'] = 'required';
        $rules['repeatPassword'] = 'required_with:password|same:password';

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
