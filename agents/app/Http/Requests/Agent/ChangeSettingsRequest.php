<?php


namespace App\Http\Requests\Agent;


use Illuminate\Foundation\Http\FormRequest;

class ChangeSettingsRequest extends FormRequest
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
            'commission' => 'required|integer|min:0|max:99999'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            '*.required' => 'Заполните',
            '*.integer' => 'Должно быть числом',
            '*.min' => 'Должно быть положительным',
            '*.max' => 'Не более 5 цифр'
        ];
    }
}
