<?php

namespace Database\Factories;

use App\Models\Dependente;
use App\Models\Associado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class DependenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dependente::class;

    /**
     * Define the model's default state.
     *
     * @return array         
     */
    public function definition(){
        //Podemos colocar mais graus de parentesco depois 
        return [
            'associado' => Associado::factory()->create()->name,
            'name' => $this->faker->name,
            'parentesco' => $this->faker->randomElement($array = array ('Filha/o','Esposa/o','Tia/o')),
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
        ];  
    }

}

