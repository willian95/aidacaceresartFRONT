<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestUserStoreRequest extends FormRequest
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
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "country" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Nombre es requerido",
            "email.required" => "Email es requerido",
            "phone.required" => "Teléfono es requerido",
            "address.required" => "Dirección es requerida",
            "country.required" => "País es requerido"
        ];
    }
}
