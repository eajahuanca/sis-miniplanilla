<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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
        $usuario = $this->route('usuario');
        return [
            'id_empleado' => ['required','unique:users,id_empleado,'.$usuario.',id'],
            'email' => ['required','unique:users,email,'.$usuario.',id','email'],
            'usuario_cuenta' => ['required','min:6','unique:users,usuario_cuenta,'.$usuario.',id'],
            'password' => ['required','min:6']
        ];
    }

    public function messages()
    {
        return [
            'id_empleado.required'  => 'El Campo Empleado es requerido',
            'id_empleado.unique'    => 'El Empleado ya se encuentra registrado, seleccione otro(a)',
            'email.required'        => 'El Campo Correo Electrónico es requerido',
            'email.unique'          => 'El Campo Correo Electrónico ya existe, cambie por otro',
            'email.email'           => 'El Campo Correo Electrónico debe tener formato',
            'usuario_cuenta.required'   => 'El Campo Cuenta de Usuario es requerido',
            'usuario_cuenta.min'        => 'El Campo Cuenta de Usuario debe contener al menos 6 caracteres',
            'usuario_cuenta.unique'     => 'El Campo Cuenta de Usuario ya existe, cambie por otro',
            'password.required'         => 'El Campo Contraseña es requerido',
            'password.min'              => 'El Campo Contraseña debe contener al menos 6 caracteres'
        ];
    }
}
