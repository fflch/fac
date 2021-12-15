<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Rules\SaldoDisponivel;

class VendaRequest extends FormRequest
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

        // verifica se o usuário é um conveniado
        $conveniado = Auth::user()->conveniado();

        return [
            'conveniado_id'       => isset($conveniado) ? 'nullable' : 'required',
            'associado_id'        => 'required',
            'data_venda'          => 'required',
            'quantidade_parcelas' => 'required|integer',
            'valor'               => ['required', 'numeric', 'gt:0', new SaldoDisponivel],
            'descricao'           => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'data_venda.required'           => 'Insira a data da venda.',
            'quantidade_parcelas.required'  => 'Insira a quantidade de parcelas.',
            'quantidade_parcelas.integer'   => 'A quantidade de parcelas deve ser um número inteiro.',
            'valor.required'                => 'Insira o valor.',
            'valor.numeric'                 => 'O valor deve ser numérico.',
            'valor.gt'                      => 'O valor deve ser maior que 0.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'valor' => str_replace(',','.',$this->valor)
        ]);
    }

}
