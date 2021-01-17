<?php

namespace Database\Factories;

use App\Models\ProductoPuesto;
use App\Models\Producto;
use App\Models\PuestosFeria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoPuestoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductoPuesto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'precio'=> $this->faker->randomNumber($nbDigits = 6, $strict = true),
            'stock'=> $this->faker->randomNumber($nbDigits = 6, $strict = true),
            'id_productos' => Producto::all()->random()->productos_id,
            'id_puestos_ferias' => PuestosFeria::all()->random()->puestos_ferias_id,
            'delete'=> FALSE
        ];
    }
}
