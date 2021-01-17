<?php

namespace Database\Factories;

use App\Models\Comuna;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComunaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comuna::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->randomElement(['Cerrillos', 'Cerro Navia', 'Conchali', 'El Bosque', 'Estación Central', 'Huechuraba', 'Independencia',
                                                    'La Cisterna', 'La Florida', 'La Granja', 'La Pintana', 'La Reina', 'Las Condes', 'Lo Barnechea']),
            'delete'=> FALSE,
        ];
    }
}
