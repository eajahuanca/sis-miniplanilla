<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmpresaRequest extends Request
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
        $empresa = $this->route('empresa');
        return [
            'emp_nombre'    => ['required','min:5','string'],
            'emp_nit'       => ['required','min:8','numeric'],
            'emp_empleador' => ['required','min:8','string'],
            'emp_caja'      => ['required','min:8','string'],
            'emp_imagen'      => ['image'],
        ];
    }

    public function messages()
    {
        return [
            'emp_nombre.required'   => 'El Campo Nombre de la Empresa es requerido',
            'emp_nombre.min'        => 'El Campo Nombre de la Empresa debe contener al menos 5 caracteres',
            'emp_nombre.string'   => 'El Campo Nombre de la Empresa debe contener solo texto',

            'emp_nit.required'  => 'El Campo NIT de la Empresa es requerido',
            'emp_nit.min'       => 'El Campo NIT de la Empresa debe contener al menos 8 caracteres',
            'emp_nit.numeric'   => 'El Campo NIT de la Empresa debe contener solo numeros',

            'emp_empleador.required'  => 'El Campo Empleador de la Empresa es requerido',
            'emp_empleador.min'       => 'El Campo Empleador de la Empresa debe contener al menos 8 caracteres',
            'emp_empleador.string'   => 'El Campo Empleador de la Empresa debe contener numeros y letras',

            'emp_caja.required'  => 'El Campo Caja Nacional de la Empresa es requerido',
            'emp_caja.min'       => 'El Campo Caja Nacional de la Empresa debe contener al menos 8 caracteres',
            'emp_caja.string'   => 'El Campo Caja Nacional de la Empresa debe contener solo texto y numeros',

            'emp_imagen.image'    => 'El Campo Logo de la Empresa solo debe ser una imagen',           
        ];
    }
}