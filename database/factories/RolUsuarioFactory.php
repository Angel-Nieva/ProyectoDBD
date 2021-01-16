<?php

namespace Database\Factories;
use App\Models\Rol;
use App\Models\Usuario;
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
            'id_usuarios' => Usuario::factory(),
            'id_rols' => Rol::factory(),
            'delete'=> $this->faker->randomElement([FALSE])
        ];
    }
}
