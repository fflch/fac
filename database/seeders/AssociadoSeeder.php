<?php

namespace Database\Seeders;

use App\Models\Associado;
use Illuminate\Database\Seeder;

class AssociadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $associado = [
            'unidade' => 'FFLCH',
            'numero_usp' => 9848815,
            'name' => 'Ana Paula Martins',
            'endereco' => 'Rua do Girassol',
            'complemento' => 'Apartamento 56 - Bloco A',
            'cidade' => 'São Paulo',
            'estado' => 'São Paulo',
            'cep' => '0686687',
            'rg' => 123456789,
            'cpf' => 12345678909,
            'data_nascimento' => '1995-09-28',

            'comercial' => 30914737,
            'residencial' => 53434480,
            'celular' => 956628978,
            'e_mail' => 'contato@usp.br',

            'banco' => 'Banco do Brasil',
            'agencia' => 35599,
            'conta_corrente' => 577751,

            'limite' => 200,
        ];
        Associado::create($associado);
        Associado::factory(20)->create();
    }
}
