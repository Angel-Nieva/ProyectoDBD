<?php

namespace Database\Factories;

use App\Models\Transaccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaccionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaccion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'monto_pagado'=> $this->faker->randomNumber($nbDigits = 1, $strict = false),
            'fecha_pago'=> $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'delete'=> FALSE
        ];
    }
}
