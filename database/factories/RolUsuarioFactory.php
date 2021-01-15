<?php

namespace Database\Factories;

use App\Models\RolUsuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolUsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RolUsuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'delete'=> $this->faker->randomElement([FALSE])
        ];
    }
}
