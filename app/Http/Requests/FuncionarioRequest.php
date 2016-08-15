<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class FuncionarioRequest extends Request
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
            'name.required'=>'Preencha um nome.',
            'nome.max'=>'Nome deve ter até 255 caracteres.',
            'telefone.required'=>'Preencha o numero de Telefone.',
            'email.required'=>'Preencha com uma email valido.',
            'email.unique'=> 'Email ja cadastrado.',
            'email.email' => 'Email deve ser cadastrado corretamente!',
            'CPF.required' => 'CPF deve ser informado.',
            'password.required' => 'A senha deve ser informada',
            'password.min' => 'A senha deve conter no minimo 8 digitos',
            'password.max' => 'A senha deve conter no maximo 16 digitos',

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
            'name' => 'required|max:255',
            'telefone' => 'required|max:15',
            'email' => 'required|email|max:255|unique:users',            
            'CPF' => 'required|max:255',
            'password' => 'required|min:8|max:16|confirmed',
            'cidade_id' => 'required|max:255',
        ];
    }
}
