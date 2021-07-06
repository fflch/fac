<?php

namespace Database\Factories;

use App\Models\Associado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssociadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Associado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unidade' => $this->faker->randomElement($array = array ('FFLCH','IFUSP','FAU')),
            'numero_usp' => $this->faker->unique()->numberBetween(1000000, 9999999),
            'name' => $this->faker->name,
            'endereco' => $this->faker->streetAddress,
            'complemento' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'cidade' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'estado' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'cep' => $this->faker->numberBetween(1000000, 9999999),
            'rg' => $this->faker->numberBetween(100000000, 999999999),
            'cpf' => $this->faker->numberBetween(10000000000, 99999999999),
            'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),

            'comercial' => $this->faker->numberBetween(10000000, 99999999),
            'residencial' => $this->faker->numberBetween(10000000, 99999999),
            'celular' => $this->faker->numberBetween(100000000, 999999999),
            'e_mail' => $this->faker->unique()->safeEmail,

            'banco' => $this->faker->company,
            'agencia' => $this->faker->numberBetween(1000000, 9999999),
            'conta_corrente' => $this->faker->unique()->numberBetween(1000000, 9999999),

            'limite' => $this->faker->numberBetween(0, 200)
        ];
    }
}
