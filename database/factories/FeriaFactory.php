<?php

namespace Database\Factories;

use App\Models\Feria;
use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->word($maxNbChars = 20, $minNbChars = 1),
            'id_direccions' => Direccion::all()->random()->direccions_id,
            'delete'=> FALSE
        ];
    }
}
