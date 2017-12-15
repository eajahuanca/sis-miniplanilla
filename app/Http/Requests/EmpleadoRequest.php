<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmpleadoRequest extends Request
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
        $empleado = $this->route('empleado');
        return [
            'em_nombre'     => ['required','min:3','string','regex:/^([a-z|A-Z]).+$/'],
            'em_paterno'    => ['required','min:3','string','regex:/^([a-z|A-Z]).+$/'],
            'em_materno'    => ['min:3','string','regex:/^([a-z|A-Z]).+$/'],
            'em_especial'   => ['min:4','string','regex:/^([a-z|A-Z]).+$/'],
            'em_cedula'     => ['required','min:7','string','unique:empleado,em_cedula,'.$empleado.',id','regex:/^([0-9|a-zA-Z]).+$/'],
            'em_nacimiento' => ['required','date'],
            'em_ciudad'     => ['required','string','min:5'],
            'em_zona'       => ['required','string','min:5'],
            'em_calle'      => ['required','string','min:5'],
            'em_numero'     => ['required','string','min:2'],
            'em_telefono'   => ['numeric'],
            'em_celular'    => ['required','numeric'],
            'em_fotografia' => ['image','mimes:jpeg,png'],
            'em_fecha_ingeso'  => ['required','date'],
            'em_sueldo_basico' => ['required','regex:/^([0-9|.]).+$/','numeric'],
            'em_bono'       => ['required','regex:/^([0-9|.]).+$/','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'em_nombre.required'    => 'El Campo Nombre del Empleado es Requerido',
            'em_nombre.min'         => 'El Campo Nombre del Empleado debe contener al menos 3 caracteres',
            'em_nombre.string'      => 'El Campo Nombre del Empleado debe contener solo texto',
            'em_nombre.regex'       => 'El Campo Nombre del Empleado debe contener solo texto y el caracter de espacio',
            
            'em_paterno.required'   => 'El Campo Apellido Paterno del Empleado es requerido',
            'em_paterno.min'        => 'El Campo Apellido Paterno del Empleado debe contener al menos 3 caracteres',
            'em_paterno.string'     => 'El Campo Apellido Paterno del Empleado debe contener solo texto',
            'em_paterno.regex'      => 'El Campo Apellido Paterno del Empleado debe contener solo texto y el caracter de espacio',

            'em_materno.min'        => 'El Campo Apellido Materno del Empleado debe contener al menos 3 caracteres',
            'em_materno.string'     => 'El Campo Apellido Materno del Empleado debe contener solo texto',
            'em_materno.regex'      => 'El Campo Apellido Materno del Empleado debe contener solo texto y el caracter de espacio',

            'em_especial.min'       => 'El Campo Apellido Especial del Empleado debe contener al menos 4 caracteres',
            'em_especial.string'    => 'El Campo Apellido Especial del Empleado debe contener solo texto',
            'em_especial.regex'     => 'El Campo Apellido Especial del Empleado debe contener solo texto y el caracter de espacio',

            'em_cedula.required'    => 'El Campo Carnet de Identidad del Empleado es requerido',
            'em_cedula.min'         => 'El Campo Carnet de Identidad del Empleado debe contener al menos 7 caracteres',
            'em_cedula.string'      => 'El Campo Carnet de Identidad del Empleado debe contener solo numeros',
            'em_cedula.regex'       => 'El Campo Carnet de Identidad del Empleado debe contener solamente numeros',
            'em_cedula.unique'      => 'El Campo Carnet de Identidad del Empleado ya existe, cambielo por otro',

            'em_nacimiento.required'=> 'El Campo Fecha de Nacimiento del Empleado es requerido',
            'em_nacimiento.date'   => 'El Campo Fecha de Nacimiento del Empleado debe ser de tipo fecha (yyyy-mm-dd o dd/mm/yyyy)',

            'em_ciudad.required'    => 'El Campo Ciudad es requerido',
            'em_ciudad.string'      => 'El Campo Ciudad debe contener texto',
            'em_ciudad.min'         => 'El Campo Ciudad debe contener al menos 5 caracteres',

            'em_zona.required'      => 'El Campo Zona es requerido',
            'em_zona.string'        => 'El Campo Zona debe contener texto',
            'em_zona.min'           => 'El Campo Zona debe contener al menos 5 caracteres',

            'em_calle.required'     => 'El Campo Avenida/Calle es requerido',
            'em_calle.string'       => 'El Campo Avenida/Calle debe contener texto',
            'em_calle.min'          => 'El Campo Avenida/Calle debe contener al menos 5 caracteres',

            'em_numero.required'    => 'El Campo Numero de la Puerta es requerido',
            'em_numero.string'      => 'El Campo Numero de la Puerta debe contener texto',
            'em_numero.min'         => 'El Campo Numero de la Puerta debe contener al menos 2 caracteres',

            'em_numero.required'    => 'El Campo Numero de la Puerta es requerido',
            'em_numero.string'      => 'El Campo Numero de la Puerta debe contener texto',
            'em_numero.min'         => 'El Campo Numero de la Puerta debe contener al menos 2 caracteres',

            'em_telefono.numeric'   => 'El Campo Telefono es numerico',

            'em_celular.numeric'    => 'El Campo Celular es numerico',
            'em_celular.required'        => 'El Campo Celular es requerido',

            'em_fotografia.image'   => 'El Campo Fotografia es de tipo Imagen',
            'em_fotografia.image'   => 'El Campo Fotografia debe contener solo archivos JPEG|JPG|PNG',
            
            'em_fecha_ingeso.required'  => 'El Campo Fecha de Ingreso del Empleado es requerido',
            'em_fecha_ingeso.date'  => 'El Campo Fecha de Ingreso del Empleado es de tipo fecha',

            'em_sueldo_basico.required' => 'El Campo Sueldo Básico es requerido',
            'em_sueldo_basico.regex'    => 'El Campo Sueldo Básico debe contener un numero decimal',
            'em_sueldo_basico.numeric'  => 'El Campo Sueldo Básico solamente de contener numeros',

            'em_bono.required' => 'El Campo Bono es requerido',
            'em_bono.regex'    => 'El Campo Bono debe contener un numero decimal',
            'em_bono.numeric'  => 'El Campo Bono solamente de contener numeros',
        ];
    }
}
