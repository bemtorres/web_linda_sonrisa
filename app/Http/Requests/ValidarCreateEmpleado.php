<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCreateEmpleado extends FormRequest
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
            'correo' => 'required|email'
        ];
    }
}