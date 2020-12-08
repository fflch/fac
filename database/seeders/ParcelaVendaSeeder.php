<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParcelaVenda;

class ParcelaVendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parcela_venda = [
            'venda_id' => 1,
            'numero' => 1,
            'datavencto' => '2020-11-03',
            'valor' => 250,
            'status' => 'A Vencer',
        ];
        ParcelaVenda::create($parcela_venda);
        ParcelaVenda::factory(100)->create();
    }
}
