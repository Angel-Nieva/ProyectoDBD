<?php

namespace Database\Factories;
use App\Models\Subcategoria;
use App\Models\UnidadesMedida;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->randomElement(['Manzana', 'Palta', 'Platano','Lechuga','Detergente omo','Mr musculo','Naranja','Zanahoria','Brocoli']),
            'descripcion'=>$this->faker->word($maxNbChars = 50, $minNbChars = 6),
            'id_subcategorias'=>Subcategoria::all()->random()->subcategorias_id,
            'id_unidades_medidas'=>UnidadesMedida::all()->random()->unidades_medidas_id,
            'delete'=> FALSE
        ];
    }
}
