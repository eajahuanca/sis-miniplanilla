<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventoRequest extends Request
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
            'fecha'     => ['required'],
            'lugar'     => ['required','min:15','string'],
            'descripcion'   => ['required','min:20','string'],
            'id_tipoevento' => ['required'],
        ];
    }

    public function messages()
    {
        return[
            'fecha.required'    => 'El Campo Fecha es requerido',
            'lugar.required'    => 'El Campo Lugar es requerido',
            'lugar.min'         => 'El Campo Lugar debe contener como minimo 15 caracteres',
            'descripcion.required' => 'El Campo Descripcion es requerido',
            'descripcion.min'      => 'El Campo Descripcion debe contener como minimo 20 caracteres',
            'id_tipoevento.required' => 'El Campo Tipo de Actividad es requerido'
        ];
    }
}