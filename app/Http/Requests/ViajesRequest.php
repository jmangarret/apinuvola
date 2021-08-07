<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViajesRequest extends FormRequest
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
            'fecha' => 'required|date|max:255',
            'pais' => 'required|string|max:100',
            'ciudad' => 'required|max:100',
            'email' => 'required|email|max:255|exists:clientes,email',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Field :attribute is required.',
            'email.exists' => 'The :attribute not exists in table Clientes.',
        ];
    }
}
