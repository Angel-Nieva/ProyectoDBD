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
            'rut'=> $this->faker->randomElement(['8268453-0', '13165525-8', '23770689-7','20583113-4','11750687-8','17580269-k','16713054-2',
                    '8898089-1','12874545-9','17892051-0','12802428-k','19182407-5','24927955-2','10266459-0','17926708-k','15137564-2',
                    '9128952-0','19704331-8','11269889-2','15294198-6','9625802-k','14580926-6','19364650-6','11658677-0','12647165-3','11386331-5']),
            'nombre'=> $this->faker->name,
            'contraseña'=> $this->faker->word($maxNbChars = 30, $minNbChars = 6),
            'email'=> $this->faker->email,
            'telefono'=> $this->faker->randomNumber($nbDigits = 8, $strict = true),
            'reputacion'=> $this->faker->numberBetween($min=0, $max=5),
            'delete'=> FALSE
        ];
    }
}
