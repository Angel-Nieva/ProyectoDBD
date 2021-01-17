<?php

namespace Database\Factories;

use App\Models\MetodoDePago;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetodoDePagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MetodoDePago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'nombre'=> $this->faker->nombre,
            'cuenta'=> $this->faker->creditCardNumber,
            'banco'=> $this->faker->randomElement(['Banco De Chile', 'Banco Santander', 'Banco Fallabella','Banco Estado','Banco de Credito e Inversiones','Banco Scotciabank']),
            'tipo_tarjeta'=> $this->faker->creditCardType,
            'delete'=> FALSE
        ];
    }
}
