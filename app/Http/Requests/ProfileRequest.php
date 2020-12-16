<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "email" => "required|email",
            "phone" => "required",
            "address" => "required",
            "country" => "required"
        ];
    }

    public function message()
    {
        return [
            "country.required" => "País es requerido",
            "name.required" => "Nombre es requerido",
            "email.required" => "Email es requerido",
            "email.email" => "Email no es válido",
            "phone.required" => "Teléfono es requerido",
            "address.required" => "Dirección es requerido"
        ];
    }
}
