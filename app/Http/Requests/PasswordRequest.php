<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request
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
            'password_actual' => ['required','current_password'],
            'password' => ['required','min:6'],
            'password_confirm' => ['required','same:password'],
        ];
    }

    public function messages()
    {
        return [
            'password_actual.required'  => 'El Campo Contraseña actual es requerido',
            'password_actual.current_password' => 'La Contraseña actual no coincide',
            'password.required' => 'El Campo Contraseña nueva es requerido',
            'password.min'      => 'El Campo Contraseña nueva debe contener al menos 6 caracteres como minimo',
            'password_confirm.required' => 'El Campo confirmar contraseña es requerido',
            'password_confirm.same'      => 'La nueva contraseña no coincide',
        ];
    }

    public function sanitize()
    {
        return $this->only('password');
    }
}
