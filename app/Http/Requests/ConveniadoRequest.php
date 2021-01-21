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
            'comissao' => 'required', 
            'max_parcelas' => 'required',
        ];
    }
}
