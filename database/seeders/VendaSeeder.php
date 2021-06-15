<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venda;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $venda = [
            'conveniado_id' => 1,
            'associado_id' => 1,
            'data_venda' => '2020-11-03',
            'quantidade_parcelas' => 2,
            'valor' => 250,
            'descricao' => 'Compra de uma camiseta',
        ];

        // mutar o VendaObserver
        Venda::withoutEvents(function () use ($venda) {

            Venda::create($venda);
            Venda::factory(20)->create();

        });


    }
}
