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
use \App\Models\TransaccionProducto;
use \App\Models\Transaccion;
use \App\Models\Valoracion;
use \App\Models\MetodoDePago;
use \App\Models\UsuarioTransaccion;
use \App\Models\UsuarioProducto;
use \App\Models\Promocion;
use \App\Models\ProductoPuesto;
use \App\Models\PuestosFeria;
use \App\Models\Comuna;
use \App\Models\Feria;
use \App\Models\ProductoPromocion;
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
        Transaccion::factory(10)->create();
        Valoracion::factory(10)->create();
        MetodoDePago::factory(10)->create();
        UsuarioTransaccion::factory(10)->create();
        UsuarioProducto::factory(10)->create();
        Promocion::factory(10)->create();
        Feria::factory(10)->create();
        PuestosFeria::factory(10)->create();
        ProductoPuesto::factory(10)->create();
        Comuna::factory(10)->create();
       
        ProductoPromocion::factory(10)->create();

    }
}
