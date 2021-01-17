<?php

namespace Database\Factories;

use App\Models\UsuarioProducto;
use App\Models\Usuario;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsuarioProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_usuario' => Usuario::all()->random()->usuario_id,
            'id_producto' => Producto::all()->random()->producto_id,
            'delete'=> FALSE
        ];
    }
}
