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
            'numero_usp' => 'required|integer',
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
            'limite' => 'required',
        ];
    }
    public function messages()
    {
          return [
            'unidade.required' => 'Unidade não pode ficar em branco.',
            'numero_usp.required' => 'Número USP não pode ficar em branco.',
            'numero_usp.integer' => 'Número USP deve ser um número.',
            'name.required' => 'Nome não pode ficar em branco.',
            'endereco.required' => 'Endereço não pode ficar em branco.',
            'complemento.required' => 'Complemento não pode ficar em branco.',
            'cidade.required' => 'Cidade não pode ficar em branco.',
            'estado.required' => 'Estado não pode ficar em branco.',
            'cep.required' => 'CEP não pode ficar em branco.',
            'rg.required'=> 'RG não pode ficar em branco.',
            'cpf.required'=> 'CPF não pode ficar em branco.',
            'data_nascimento.required'=> 'Data de nascimento não pode ficar em branco.',
            'comercial.required'=> 'Contato comercial não pode ficar em branco.',
            'residencial.required' => 'Contato residencial não pode ficar em branco.',
            'celular.required' => 'Contato celular não pode ficar em branco.',
            'e_mail.required' => 'E-mail não pode ficar em branco.',
            'banco.required' => 'Banco não pode ficar em branco.',
            'agencia.required' => 'Agência não pode ficar em branco.',
            'conta_corrente.required' => 'Conta Corrente não pode ficar em branco.',
            'limite.required' => 'Limite não pode ficar em branco.',
          ];
    }
}
