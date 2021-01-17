<?php

namespace Database\Factories;

use App\Models\UsuarioTransaccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioTransaccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsuarioTransaccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usuarios' => Usuario::all()->random()->usuarios_id,
            'id_transaccions' => Transaccion::all()->random()->transaccions_id,
            'delete'=> FALSE
        ];
    }
}
