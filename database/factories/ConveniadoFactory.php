<?php

namespace Database\Factories;

use App\Models\Conveniado;
use App\Models\Associado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConveniadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conveniado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'razao_social' => $this->faker->company,
            'nome_fantasia' => $this->faker->company,
            'endereco' =>  $this->faker->streetAddress,
            'complemento' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'cidade' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'estado' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'cep' => $this->faker->numberBetween(1000000, 9999999),
            'ie' => $this->faker->numberBetween(100000000000, 999999999999),
            'cnpj' => $this->faker->numberBetween(10000000000000, 99999999999900),
            'responsavel' => Associado::factory()->create()->name,

            'comercial' => $this->faker->numberBetween(10000000, 99999999),
            'recado' => $this->faker->numberBetween(10000000, 99999999),
            'celular' => $this->faker->numberBetween(100000000, 999999999),
            'e_mail' => $this->faker->unique()->safeEmail,

            'banco' => $this->faker->company,
            'agencia' => $this->faker->numberBetween(1000000, 9999999),
            'conta_corrente' => $this->faker->unique()->numberBetween(1000000, 9999999),
            'tipo_comissao' => $this->faker->randomElement($array = array ('Percentual','Real')),
            'comissao' => $this->faker->numberBetween(0, 10),
            'max_parcelas' => $this->faker->randomDigit,
            'user_id'=> User::factory()->create()->id,

        ];
    }
}

