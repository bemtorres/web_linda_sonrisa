<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadCreateProveedor extends FormRequest
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
            'username' => 'required|min:3|max:100',
            'nombre_empresa' => 'required|min:3|max:100',
            'rubro' => 'required|min:3|max:100',
            'telefono' => 'required',
            'correo' => 'required|email'
        ];
    }
}
