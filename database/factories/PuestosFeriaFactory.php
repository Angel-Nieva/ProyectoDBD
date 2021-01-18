<?php

namespace Database\Factories;

use App\Models\PuestosFeria;
use App\Models\Usuario;
use App\Models\Feria;
use Illuminate\Database\Eloquent\Factories\Factory;

class PuestosFeriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PuestosFeria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->word($maxNbChars = 20, $minNbChars = 1),
            'id_usuarios' => Usuario::all()->random()->id,
            'id_ferias' => Feria::all()->random()->id,
            'delete'=> FALSE
        ];
    }
}
