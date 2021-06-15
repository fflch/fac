<?php

namespace Database\Factories;

use App\Models\Venda;
use App\Models\Associado;
use App\Models\Conveniado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venda::class;

    /**
     * Define the model's default state.
     *           
     * @return array
     */
    public function definition()
    {
        return [
            'conveniado_id' => Conveniado::factory()->create()->id,
            'associado_id' => Associado::factory()->create()->id,
            'data_venda' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'quantidade_parcelas' => $this->faker->randomDigit,
            'valor' => $this->faker->numberBetween(0, 1000),
            'descricao' => $this->faker->text,
        ];
    }
}
