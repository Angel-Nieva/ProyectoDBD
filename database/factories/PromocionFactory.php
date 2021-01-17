<?php

namespace Database\Factories;

use App\Models\Promocion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromocionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promocion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descuento'=> $this->faker->numberBetween($min = 1, $max = 99),
            'tiempo'=> $this->faker->numberBetween($min = 1, $max = 100),
            'id_usuarios' => Usuario::all()->random()->usuarios_id,
            'delete'=> FALSE
        ];
    }
}
