<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $required = $isUpdate ? '' : 'required';

        return [
            'name'=>[$required,'string'],
            'poster'=>['nullable','file']
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" является обязательным.',
            'name.string' => 'Поле "Название" должно быть строкой.',
            'poster.string' => 'Поле "Постер" должно быть строкой.',
        ];
    }
}
