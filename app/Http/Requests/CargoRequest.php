<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CargoRequest extends Request
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
        $cargo = $this->route('cargo');
        return [
            'car_nombre' => ['required','min:10','string','unique:cargo,car_nombre,'.$cargo.',id','regex:/^([a-z|A-Z]).+$/'],
            'car_descripcion' => 'required|string|min:20',
        ];
    }

    public function messages()
    {
        return [
            'car_nombre.required' => 'El Campo Nombre del Cargo es Requerido',
            'car_nombre.min'      => 'El Campo Nombre del Cargo debe contener al menos 10 caracteres',
            'car_nombre.string'   => 'El Campo Nombre del Cargo debe contener solo texto',
            'car_nombre.unique'   => 'El Campo Nombre del Cargo ya existe, cambielo por otro',
            'car_nombre.regex'    => 'El Campo Nombre del Cargo solo debe contener texto y el caracter de espacio',

            'car_descripcion.required' => 'El Campo Descripcion del Cargo es requerido',
            'car_descripcion.string'   => 'El Campo Descripcion del Cargo solo de contener texto',
            'car_descripcion.min'      => 'El Campo Descripcion del Cargo debe contener al menos 20 caracteres',
                ];
    }
}