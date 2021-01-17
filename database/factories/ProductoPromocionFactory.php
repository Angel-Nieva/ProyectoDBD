<?php

namespace Database\Factories;

use App\Models\ProductoPromocion;
use App\Models\Promocion;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoPromocionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductoPromocion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_productos' => Producto::all()->random()->productos_id,
            'id_promocions' => Promocion::all()->random()->promocions_id,
            'delete'=> FALSE
        ];
    }
}
