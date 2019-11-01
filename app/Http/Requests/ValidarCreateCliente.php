<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCreateCliente extends FormRequest
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
            'run' => 'required|min:8|max:9',
            'nombres' => 'required|min:3|max:100',
            'apellidos' => 'required|min:3|max:100',
            'telefono' => 'required',
            'id_comuna' => 'required|exists:comuna,id_comuna',
            'direccion' => 'required|min:1|max:100',
            'correo' => 'required|email'
        ];
    }
}
