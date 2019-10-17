<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCreateProducto extends FormRequest
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
            'nombre_producto' => 'required|min:2|max:60',
            'descripcion' => 'required|min:3|max:100',
            'id_familia' => 'required|exists:familia,id_familia',
            'id_tipo_producto' => 'required|exists:tipo_producto,id_tipo_producto',
            'stock' => 'required',
            'stock_critico' => 'required'
        ];
    }
}
