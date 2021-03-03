<?php

namespace Database\Factories;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcategoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_subcategoria' =>$this->faker->randomElement(['Manzana Roja','Limpiamuebles','Manzana Roja','Manzana verde','Detergente']),
            'descripcion_subcategoria' =>$this->faker->word($maxNbChars = 50, $minNbChars = 6),
            'id_categorias'=> Categoria::all()->random()->id,
            'delete'=> FALSE
        ];
    }
}
