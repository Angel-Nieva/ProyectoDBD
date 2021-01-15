<?php

namespace Database\Factories;

use App\Models\UnidadesMedida;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadesMedidaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnidadesMedida::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo' =>$this->faker->randomElement(['Unidades','Docenas','Kilogramos','Litros','Gramos']),
            'cantidad'=>$this->faker->numberBetween($min=1, $max=20)
        ];
    }
}
