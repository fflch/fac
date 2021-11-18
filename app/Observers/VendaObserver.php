<?php

namespace App\Observers;

use App\Models\Venda;
use App\Models\ParcelaVenda;
use Auth;
use Carbon\Carbon;

class VendaObserver
{
    /**
     * Handle the Venda "created" event.
     *
     * @param  \App\Models\Venda  $venda
     * @return void
     */

    public function created(Venda $venda)
    {
        // Calculando a comissão
        if(auth()->check()){
            $conveniado = auth()->user()->conveniado();

            if (!empty($conveniado)) {
                $this->conveniado_id = $conveniado->id;
            }
            // armazena a comissão do conveniado
            if ($venda->conveniado->tipo_comissao == 'Percentual') {

              // isso poderia ficar melhor com a implementação correta dos tipos dos campos
              $comissao = ((float)$venda->conveniado->comissao/100)*(float)$venda->valor;

            } elseif ($venda->conveniado->tipo_comissao == 'Real') {

              $comissao = $venda->conveniado->comissao;
            }

            $venda->comissao = $comissao;
        }

        // Lanças as parcelas
        for($i = 1 ; $i <= $venda->quantidade_parcelas; $i++){
          $parcela_venda = new ParcelaVenda;
          $parcela_venda->venda_id = $venda->id;
          $parcela_venda->numero = $i;
          $parcela_venda->valor = $venda->valor_raw/ (float) $venda->quantidade_parcelas;
          $parcela_venda->comissao = (float)$venda->comissao/ (float)$venda->quantidade_parcelas;
          
          # Vamos fixar no dia 10 de cada mês
          $date = Carbon::createFromFormat('d/m/Y', $venda->data_venda);
          $parcela_venda->datavencto = $date->day(10)->addMonth($i);;
          $parcela_venda->status = 'A Vencer';
          $parcela_venda->save();
      }

      // somando valores quebrados na última parcela
      $sobra = $venda->valor_raw - ($parcela_venda->valor_raw * (float)$venda->quantidade_parcelas);
      $parcela_venda->valor = $parcela_venda->valor_raw + $sobra;
      $parcela_venda->save();
    }
}
