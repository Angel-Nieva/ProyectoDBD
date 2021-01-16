<?php

namespace Database\Seeders;
use \App\Models\Categoria;
use \App\Models\Subcategoria;
use \App\Models\Producto;
use \App\Models\TransaccionsProducto;
use \App\Models\UnidadesMedida;
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
        Categoria::factory(10)->create();
        UnidadesMedida::factory(10)->create();
        Usuario::factory(10)->create();
        Permiso::factory(10)->create();
        Rol::factory(10)->create();
        Direccion::factory(10)->create();
        RolUsuario::factory(10)->create();
        PermisoRol::factory(10)->create();
        Subcategoria::factory(10)->create();
        Producto::factory(10)->create();
        TransaccionsProducto::factory(10)->create();
        
    }
}
