<?php


namespace App\Http\Requests\User;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
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
            'newPassword' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised()
            ],
        ];

        $rules['currentPassword'] = 'required';
        $rules['repeatNewPassword'] = 'required_with:newPassword|same:newPassword';

        return $rules;
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Заполните',
            '*.min' => 'Должно быть не меньше 8',
        ];
    }
}
