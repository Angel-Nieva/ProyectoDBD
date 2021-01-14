<?php

namespace Database\Seeders;

use \App\Models\Rol;
use \App\Models\Permiso;
use \App\Models\Usuario;
use \App\Models\PermisoRol;
use \App\Models\RolUsuario;
use \App\Models\Direccion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Rol::factory()->create();
        Permiso::factory()->create();
        Usuario::factory()->create();
        PermisoRol::factory()->create();
        RolUsuario::factory()->create();
        Direccion::factory()->create();
    }
}
