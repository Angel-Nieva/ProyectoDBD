<?php

namespace Database\Factories;

use App\Models\Valoracion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ValoracionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Valoracion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'puntaje'=> $this->faker->numberBetween($min=1, $max=5),
            'comentario'=>$this->faker->word($maxNbChars = 50, $minNbChars = 6),
            'delete'=> FALSE
        ];
    }
}
