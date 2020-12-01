<?php

namespace Database\Factories;

use App\Models\ParcelaVenda;
use App\Models\Venda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ParcelaVendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ParcelaVenda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'venda_id' => Venda::factory()->create()->id,
            'numero' => Venda::factory()->create()->quantidade_parcelas,
            'datavencto' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'valor' => Venda::factory()->create()->valor,
            'status' => $this->faker->randomElement($array = array ('A Vencer','Baixado','Vencido')),
        ];
    }
}
