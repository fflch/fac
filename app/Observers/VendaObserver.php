<?php

namespace App\Observers;

use App\Models\Venda;
use Auth;

class VendaObserver
{
    /**
     * Handle the Venda "created" event.
     *
     * @param  \App\Models\Venda  $venda
     * @return void
     */

    public function creating(Venda $venda)
    {

        // verifica se o usuário é um conveniado
        $conveniado = Auth::user()->conveniado();

        if (!empty($conveniado)) {
            $venda->conveniado_id = $conveniado->id;
        }

        // armazena a comissão do conveniado
        if ($venda->conveniado->tipo_comissao == 'Percentual') {

          // isso poderia ficar melhor com a implementação correta dos tipos dos campos
          $comissao = ((int)$venda->conveniado->comissao/100)*(int)$venda->valor;

        } elseif ($venda->conveniado->tipo_comissao == 'Real') {

          $comissao = $venda->conveniado->comissao;
        }

        $venda->comissao = $comissao;

    }
}
