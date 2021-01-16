<?php

namespace Database\Factories;
use App\Models\Permiso;
use App\Models\Rol;
use App\Models\PermisoRol;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermisoRolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PermisoRol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_permisos' => Permiso::all()->random()->permisos_id,
            'id_rols' => Rol::all()->random()->rols_id,
            'delete'=> FALSE
        ];
    }
}
