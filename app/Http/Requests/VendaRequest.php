<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

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
            'conveniado_id' => isset($conveniado) ? 'nullable' : 'required',
            'associado_id' => 'required',
            'data_venda' => 'required',
            'quantidade_parcelas' => 'required|integer',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'valor' => str_replace(',','.',$this->valor)
        ]);
    }

}
