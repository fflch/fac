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

        // verifica se é um cenário de factory ou não 
        try {

            // verifica se o usuário é um conveniado
            $conveniado = Auth::user()->conveniados()->first();

            if (!empty($conveniado)) {
                $venda->conveniado_id = $conveniado->id;
            }
        }
        finally {return;}


    }
     
    public function created(Venda $venda)
    {
        //
    }

    /**
     * Handle the Venda "updated" event.
     *
     * @param  \App\Models\Venda  $venda
     * @return void
     */
    public function updated(Venda $venda)
    {
        //
    }

    /**
     * Handle the Venda "deleted" event.
     *
     * @param  \App\Models\Venda  $venda
     * @return void
     */
    public function deleted(Venda $venda)
    {
        //
    }

    /**
     * Handle the Venda "restored" event.
     *
     * @param  \App\Models\Venda  $venda
     * @return void
     */
    public function restored(Venda $venda)
    {
        //
    }

    /**
     * Handle the Venda "force deleted" event.
     *
     * @param  \App\Models\Venda  $venda
     * @return void
     */
    public function forceDeleted(Venda $venda)
    {
        //
    }
}
