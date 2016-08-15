<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AcademiaRequest extends Request
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
     public function messages()
    {
        return [
            'nome.required'=>'Preencha um nome',
            'nome.max'=>'Nome deve ter até 255 caracteres',
            'CNPJ.max'=>'CNPJ deve ter até 255 caracteres',
            'CNPJ.required' => 'CNPJ é obrigatorio',
            'numQuadras.required'=>'O número de quadras deve ser informado',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=>'required|max:255',
            'CNPJ'=>'required|max:255',
            'numQuadras'=>'required|numeric'
        ];
    }
}
