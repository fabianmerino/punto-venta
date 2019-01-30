<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'nombre'    => 'required',
            'dni'       => 'required|size:8|unique:clientes,dni,NULL,id,deleted_at,NULL',
            'ruc'       => 'nullable|size:11',
            'direccion' => 'nullable|max:255',
            'telefono'  => 'nullable|alpha_num|max:50',
            'email'     => 'nullable|email|max:255',
            'web'       => 'nullable|url|max:100',
            'limite_credito' => 'numeric',
            'folio'     => 'required|unique:clientes,folio',
        ];
    }
}
