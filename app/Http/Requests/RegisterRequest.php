<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "email" => "required|email|unique:users",
            "phone" => "required",
            "address" => "required",
            "password" => "required|confirmed|min:8"
        ];
    }

    public function messages(){

        return[
            "name.required" => "Nombre es requerido",
            "email.required" => "Email es requerido",
            "email.email" => "Email no es válido",
            "email.unique" => "Este email ya está en uso",
            "phone.required" => "Teléfono es requerido",
            "address.required" => "Dirección es requerido",
            "password.required" => "Contraseña es requerida",
            "password.confirmed" => "Contraseñas no coinciden",
            "password.min" => "Contraseña debe contener al menos 8 caracteres"
        ];

    }
}
