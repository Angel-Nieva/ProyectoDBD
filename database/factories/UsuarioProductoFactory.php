<?php

namespace Database\Factories;

use App\Models\UsuarioProducto;
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
            'id_usuarios' => Usuario::all()->random()->usuarios_id,
            'id_productos' => Producto::all()->random()->productos_id,
            'delete'=> FALSE
        ];
    }
}
