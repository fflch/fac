<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConveniadoRequest extends FormRequest
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

      // validação para senha quando for criar um usuário
      if ($this->_method) $password_rule = 'nullable';
      else $password_rule = 'required';

        return [
            'razao_social' => 'required',
            'nome_fantasia' => 'required',
            'endereco' => 'required',
            'complemento' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'ie' => 'required',
            'cnpj'=>'required',
            'responsavel' => 'required',
            'comercial' => 'required',
            'recado' => 'required',
            'celular' => 'required',
            'e_mail' => 'required',
            'banco' => 'required',
            'agencia' => 'required',
            'conta_corrente' => 'required',
            'tipo_comissao' => 'required',
            'comissao' => 'required|numeric',
            'max_parcelas' => 'required',
            'password' => $password_rule,
        ];
    }

    public function messages()
    {
          return [
            'razao_social.required' => 'Razão social não pode ficar em branco.',
            'nome_fantasia.required' => 'Nome fantasia não pode ficar em branco.',
            'endereco.required' => 'Endereço não pode ficar em branco.',
            'complemento.required' => 'Complemento não pode ficar em branco.',
            'cidade.required' => 'Cidade não pode ficar em branco.',
            'estado.required' => 'Estado não pode ficar em branco.',
            'cep.required' => 'CEP não pode ficar em branco.',
            'ie.required' => 'IE não pode ficar em branco.',
            'cnpj.required'=> 'CNPJ não pode ficar em branco.',
            'responsavel.required' =>'Responsável não pode ficar em branco.',
            'comercial.required' => 'Comercial não pode ficar em branco.',
            'recado.required' => 'Recado não pode ficar em branco.',
            'celular.required' => 'Celular não pode ficar em branco.',
            'e_mail.required' => 'E-mail não pode ficar em branco.',
            'banco.required' => 'Banco não pode ficar em branco.',
            'agencia.required' => 'Agência não pode ficar em branco.',
            'conta_corrente.required' => 'Conta Corrente não pode ficar em branco.',
            'tipo_comissao.required' => 'Tipo de Comissão não pode ficar em branco.',
            'comissao.required' => 'Comissão não pode ficar em branco.',
            'comissao.numeric' => 'Comissão deve ser um número.',
            'max_parcelas.required' => 'Máximo de Parcelas não pode ficar em branco.',
            'password.required' => 'Senha não pode ficar em branco.',
          ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'comissao' => str_replace(',','.',$this->comissao)
        ]);
    }
}
