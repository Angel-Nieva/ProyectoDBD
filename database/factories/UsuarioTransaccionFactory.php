<?php

namespace Database\Factories;

use App\Models\UsuarioTransaccion;
use App\Models\Usuario;
use App\Models\Transaccion;
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
            'id_usuario' => Usuario::all()->random()->usuario_id,
            'id_transaccion' => Transaccion::all()->random()->transaccion_id,
            'delete'=> FALSE
        ];
    }
}
