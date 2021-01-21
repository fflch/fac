<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conveniado;

class ConveniadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conveniado = [
            'razao_social' => 'Unimed do Estado de Sao Paulo',
            'nome_fantasia' => 'Unimed Fesp',
            'endereco' => 'Rua do Sol',
            'complemento' => '5º Andar - Bloco A',
            'cidade' => 'São Paulo',
            'estado' => 'São Paulo',
            'cep' => '0686687',
            'ie' => 111650234119,
            'cnpj'=> 93839398472782,
            'responsavel' => 'Ana Paula Martins',

            'comercial' => 30914737,
            'recado' => 53434480,
            'celular' => 956628978,
            'e_mail' => 'contato@usp.br',

            'banco' => 'Banco do Brasil',
            'agencia' => 35599,
            'conta_corrente' => 577752,
            'tipo_comissao' => 'Percentual',
            'comissao' => '10', 
            'max_parcelas' => 3,
        ];
        Conveniado::create($conveniado);
        Conveniado::factory(100)->create();
    }
}
