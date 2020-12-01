<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssociadoRequest extends FormRequest
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
            'unidade' => 'required',
            'numero_usp' => 'required',
            'name' => 'required',
            'endereco' => 'required',
            'complemento' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'rg'=> 'required',
            'cpf'=> 'required',
            'data_nascimento'=> 'required',
            'comercial'=> 'required',
            'residencial' => 'required',
            'celular' => 'required',
            'e_mail' => 'required',
            'banco' => 'required',
            'agencia' => 'required',
            'conta_corrente' => 'required',
            'saldo' => 'required',
        ];
    }
}
