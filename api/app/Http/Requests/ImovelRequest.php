<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'logradouro' => 'required', 
            'bairro' => 'required', 
            'municipio' => 'required', 
            'estado' => 'required', 
            'cep' => 'required', 
            'tipo_imovel' => 'required'
        ];
    }
}
