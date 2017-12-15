<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PagoRequest extends Request
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
        /*
        * regex para validar numero decimal al igual que numeric
        * regex:/^([0-9]).*$/
        */
        return [
            'pag_dias'      => ['required','numeric'],
            'pag_sueldo'    => ['required','numeric'],
            'pag_cantidad'  => ['required','numeric'],
            'pag_pagado'    => ['required','numeric'],
            'pag_produccion'=> ['required','numeric'],
            'pag_dominical' => ['required','numeric'],
            'pag_otrobono'  => ['required','numeric'],
            'pag_aporte'    => ['required','numeric'],
            'pag_anticipos' => ['required','numeric'],            
        ];
    }

    public function messages()
    {
        return [
            'pag_dias.required'     => 'El Campo Dias Trabajados es requerido',
            'pag_dias.numeric'      => 'El Campo Dias Trabajados debe de contener solo numeros',
            'pag_sueldo.required'   => 'El Campo Salario Ganado es requerido',
            'pag_sueldo.numeric'    => 'El Campo Salario Ganado debe contener solo numero y el punto (Ej.:300.50)',
            'pag_cantidad.required' => 'El Campo Cantidad es requerido',
            'pag_cantidad.numeric'  => 'El Campo Cantidad debe de contener solo numeros',
            'pag_pagado.required'   => 'El Campo Monto Pagado es requerido',
            'pag_pagado.numeric'    => 'El Campo Monto Pagado debe contener solo numero y el punto (Ej.:15.50)',
            'pag_produccion.required' => 'El Campo Bono Produccion es requerido',
            'pag_produccion.numeric'  => 'El Campo Bono Produccion debe contener solo numero y el punto (Ej.:15.50)',
            'pag_dominical.required'=> 'El Campo Dominicales es requerido',
            'pag_dominical.numeric' => 'El Campo Dominicales debe contener solo numero y el punto (Ej.:15.50)',
            'pag_otrobono.required' => 'El Campo Otros Bonos es requerido',
            'pag_otrobono.numeric'  => 'El Campo Otros Bonos debe contener solo numero y el punto (Ej.:15.50)',
            'pag_aporte.required'   => 'El Campo Aporte Nacional Solidario es requerido',
            'pag_aporte.numeric'    => 'El Campo Aporte Nacional Solidario debe contener solo numero y el punto (Ej.:15.50)',
            'pag_anticipos.required'=> 'El Campo Anticipos y otros Descuentos es requerido',
            'pag_anticipos.numeric' => 'El Campo Anticipos y otros Descuentos debe contener solo numero y el punto (Ej.:15.50)',
        ];
    }
}
