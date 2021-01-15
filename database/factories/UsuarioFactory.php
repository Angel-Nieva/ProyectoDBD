<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rut'=> $this->faker->randomElement(['8268453-0', '13165525-8', '23770689-7','20583113-4','11750687-8','17580269-k']),
            'nombre'=> $this->faker->name,
            'contraseña'=> $this->faker->word($maxNbChars = 30, $minNbChars = 6),
            'email'=> $this->faker->email,
            'telefono'=> $this->faker->randomNumber($nbDigits = 8, $strict = true),
            'reputacion'=> $this->faker->numberBetween($min=0, $max=5),
            'delete'=> $this->faker->randomElement([FALSE])
        ];
    }
}
