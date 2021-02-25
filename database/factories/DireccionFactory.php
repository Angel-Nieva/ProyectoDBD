<?php

namespace Database\Factories;

use App\Models\Direccion;
use App\Models\Usuario;
use App\Models\Comuna;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Direccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'calle'=> $this->faker->streetName,
            'numero'=> $this->faker->numberBetween($min=1, $max=9999),
            'id_usuarios' => Usuario::all()->random()->id,
            'id_comunas' => Comuna::all()->random()->id,
            'delete'=> FALSE
        ];
    }
}
