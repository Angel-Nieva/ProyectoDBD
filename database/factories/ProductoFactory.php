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
            'precio'=>$this->faker->numberBetween($min=50,$max=50000),
            'stock'=>$this->faker->numberBetween($min=0,$max=5000),
            'id_subcategorias'=>Subcategoria::all()->random()->id,
            'id_unidades_medidas'=>UnidadesMedida::all()->random()->id,
            'delete'=> FALSE
        ];
    }
}
