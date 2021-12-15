<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Associado;

class SaldoDisponivel implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Verifica se o associado possui saldo para realizar a compra.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $associado = self::associado(request()->get('associado_id'));
        $saldo = $associado->saldo();
        
        if ($value <= $saldo) {

            return true;

        } else {

            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $associado = self::associado(request()->get('associado_id'));
        return 'Valor da compra superior ao saldo disponível de R$ ' . number_format($associado->saldo(), 2, ',', '') . ' para ' . $associado->name;
    }

    /**
    * Retorna o model Associado em questão.
    *
    * @param  string $id 
    * @return Associado object
    */    
    private function associado($id)
    {
        return Associado::where('id', $id)->first();
    }
}
   
