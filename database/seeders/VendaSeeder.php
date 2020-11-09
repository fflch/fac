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
            'id_conveniado' => 'Ana Paula Martins',
            'id_associado' => 'Ana Paula Martins',
            'data_venda' => '2020-11-03',
            'quantidade_parcelas' => 2,
            'valor' => 250,
            'descricao' => 'Compra de uma camiseta',
            'status' => 'A Vencer',
        ];
        Venda::create($venda);
        Venda::factory(100)->create();
    }
}
