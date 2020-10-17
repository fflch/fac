<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dependente;

class DependenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dependente = [
            'associado' => 'Ana Paula Martins',
            'name' => 'Sofia Martins',
            'parentesco' => 'Filha',
            'endereco' => 'Rua do Girassol',
            'complemento' => 'Apartamento 56 - Bloco A',
            'cidade' => 'São Paulo',
            'estado' => 'São Paulo',
            'cep' => '0686687',
            'rg' => 123456108,
            'cpf' => 12345678303,
            'data_nascimento' => '1995-09-09',

            'comercial' => 30914737,
            'residencial' => 53434480,
            'celular' => 956628978,
            'e_mail' => 'contato@if.com',
        ];
        Dependente::create($dependente);
        Dependente::factory(100)->create();
    }
}

