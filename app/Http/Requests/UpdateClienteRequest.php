<?php

namespace App\Http\Requests;

use App\Cliente;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
//        dd($this->input('dni'), $this->cliente);
        return [
            'nombre'    => 'required',
            'dni'       => 'nullable|size:8|unique:clientes,dni,'.$this->input('dni').',dni,deleted_at,NULL',
            'ruc'       => 'nullable|size:11',
            'direccion' => 'nullable|max:255',
            'telefono'  => 'nullable|alpha_num|max:50',
            'email'     => 'nullable|email|max:255',
            'web'       => 'nullable|url|max:100',
            'limite_credito' => 'numeric',
            'folio'     => 'required|numeric',
        ];
    }
}
