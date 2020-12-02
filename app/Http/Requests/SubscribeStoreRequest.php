<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeStoreRequest extends FormRequest
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
            "newsletterEmail" =>"required|email"
        ];
    }

    public function messages()
    {
        return [
            "newsletterEmail.required" =>"Email es requerido",
            "newsletterEmail.email" =>"Email no es válido",
        ];
    }
}
