<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AreaRequest extends Request
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
        $area = $this->route('area');
        return [
            'ar_nombre' => ['required','min:10','string','unique:area,ar_nombre,'.$area.',id','regex:/^([a-z|A-Z]).+$/'],
            'ar_descripcion' => 'required|string|min:20',
        ];
    }

    public function messages()
    {
        return [
            'ar_nombre.required' => 'El Campo Nombre del Area es Requerido',
            'ar_nombre.min'      => 'El Campo Nombre del Area debe contener al menos 10 caracteres',
            'ar_nombre.string'   => 'El Campo Nombre del Area debe contener solo texto',
            'ar_nombre.unique'   => 'El Campo Nombre del Area ya existe, cambielo por otro',
            'ar_nombre.regex'    => 'El Campo Nombre del Area solo debe contener texto y el caracter de espacio',

            'ar_descripcion.required' => 'El Campo Descripcion del Area es requerido',
            'ar_descripcion.string'   => 'El Campo Descripcion del Area solo de contener texto',
            'ar_descripcion.min'      => 'El Campo Descripcion del Area debe contener al menos 20 caracteres',
                ];
    }
}