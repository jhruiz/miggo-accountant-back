<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'El :attribute es obligatorio.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide',
            'password.bail' => 'debe introducir un valor valido.',
            'email.required' => 'El :attribute es obligatorio.'
        ];
    }
}
