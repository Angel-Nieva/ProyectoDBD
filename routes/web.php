<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});
Route::get('/crear_producto', function () {
    return view('creacion');
});
Route::get('/home', function () {
    return view('home');
});

//Rutas Main
Route::post('/main/checkLogin', 'MainController@checkLogin')->name('checkLogin');
Route::get('/main/successLogin/{id}', 'MainController@successLogin')->name('successLogin');
Route::post('/main/registro', 'MainController@registro')->name('registro');

//rutas de 'permisos'
Route::get('/permisos','PermisoController@index');
Route::post('/permisos/create','PermisoController@store');
Route::get('/permisos/{id}','PermisoController@show');
Route::put('/permisos/update/{id}','PermisoController@update');
Route::delete('/permisos/delete/{id}','PermisoController@destroy');

//rutas de 'rols'
Route::get('/rols','RolController@index');
Route::post('/rols/create','RolController@store');
Route::get('/rols/{id}','RolController@show');
Route::put('/rols/update/{id}','RolController@update');
Route::delete('/rols/delete/{id}','RolController@destroy');

//rutas de 'direccions'
Route::get('/direccions','DireccionController@index');
Route::post('/direccions/create','DireccionController@store');
Route::get('/direccions/{id}','DireccionController@show');
Route::put('/direccions/update/{id}','DireccionController@update');
Route::delete('/direccions/delete/{id}','DireccionController@destroy');

//rutas de 'usuario'
Route::get('/usuarios','UsuarioController@index');
Route::post('/usuarios/create','UsuarioController@store');
Route::get('/usuarios/{id}','UsuarioController@show');
Route::put('/usuarios/update/{id}','UsuarioController@update');
Route::delete('/usuarios/delete/{id}','UsuarioController@destroy');

//rutas de 'permiso_rols'
Route::get('/permiso_rols','PermisoRolController@index');
Route::post('/permiso_rols/create','PermisoRolController@store');
Route::get('/permiso_rols/{id}','PermisoRolController@show');
Route::put('/permiso_rols/update/{id}','PermisoRolController@update');
Route::delete('/permiso_rols/delete/{id}','PermisoRolController@destroy');

//rutas de 'rol_usuarios'
Route::get('/rol_usuarios','RolUsuarioController@index');
Route::post('/rol_usuarios/create','RolUsuarioController@store');
Route::get('/rol_usuarios/{id}','RolUsuarioController@show');
Route::put('/rol_usuarios/update/{id}','RolUsuarioController@update');
Route::delete('/rol_usuarios/delete/{id}','RolUsuarioController@destroy');

//rutas de 'categorias'
Route::get('/categorias','CategoriaController@index');
Route::post('/categorias/create','CategoriaController@store');
Route::get('/categorias/{id}','CategoriaController@show');
Route::put('/categorias/update/{id}','CategoriaController@update');
Route::delete('/categorias/delete/{id}','CategoriaController@destroy');

//rutas de 'productos'
Route::get('/productos','ProductoController@index');
Route::post('/productos/create','ProductoController@store');
Route::get('/productos/{id}','ProductoController@show');
Route::put('/productos/update/{id}','ProductoController@update');
Route::delete('/productos/delete/{id}','ProductoController@destroy');

//rutas de 'subcategorias'
Route::get('/subcategorias','SubcategoriaController@index');
Route::post('/subcategorias/create','SubcategoriaController@store');
Route::get('/subcategorias/{id}','SubcategoriaController@show');
Route::put('/subcategorias/update/{id}','SubcategoriaController@update');
Route::delete('/subcategorias/delete/{id}','SubcategoriaController@destroy');

//rutas de 'unidades_medidas'
Route::get('/unidades_medidas','UnidadesMedidaController@index');
Route::post('/unidades_medidas/create','UnidadesMedidaController@store');
Route::get('/unidades_medidas/{id}','UnidadesMedidaController@show');
Route::put('/unidades_medidas/update/{id}','UnidadesMedidaController@update');
Route::delete('/unidades_medidas/delete/{id}','UnidadesMedidaController@destroy');

//rutas de 'transaccions_productos'
Route::get('/transaccions_productos','TransaccionsProductoController@index');
Route::post('/transaccions_productos/create','TransaccionsProductoController@store');
Route::get('/transaccions_productos/{id}','TransaccionsProductoController@show');
Route::put('/transaccions_productos/update/{id}','TransaccionsProductoController@update');
Route::delete('/transaccions_productos/delete/{id}','TransaccionsProductoController@destroy');

//rutas de 'comunas'
Route::get('/comunas','ComunaController@index');
Route::post('/comunas/create','ComunaController@store');
Route::get('/comunas/{id}','ComunaController@show');
Route::put('/comunas/update/{id}','ComunaController@update');
Route::delete('/comunas/delete/{id}','ComunaController@destroy');

//rutas de 'ferias'
Route::get('/ferias','FeriaController@index');
Route::post('/ferias/create','FeriaController@store');
Route::get('/ferias/{id}','FeriaController@show');
Route::put('/ferias/update/{id}','FeriaController@update');
Route::delete('/ferias/delete/{id}','FeriaController@destroy');

//rutas de 'puestos_ferias'
Route::get('/puestos_ferias','PuestosFeriaController@index');
Route::post('/puestos_ferias/create','PuestosFeriaController@store');
Route::get('/puestos_ferias/{id}','PuestosFeriaController@show');
Route::put('/puestos_ferias/update/{id}','PuestosFeriaController@update');
Route::delete('/puestos_ferias/delete/{id}','PuestosFeriaController@destroy');

//rutas de 'promociones'
Route::get('/promociones','PromocionController@index');
Route::post('/promociones/create','PromocionController@store');
Route::get('/promociones/{id}','PromocionController@show');
Route::put('/promociones/update/{id}','PromocionController@update');
Route::delete('/promociones/delete/{id}','PromocionController@destroy');

//rutas de 'productos_puestos'

Route::get('/productos_puestos','ProductoPuestoController@index');
Route::post('/productos_puestos/create','ProductoPuestoController@store');
Route::get('/productos_puestos/{id}','ProductoPuestoController@show');
Route::put('/productos_puestos/update/{id}','ProductoPuestoController@update');
Route::delete('/productos_puestos/delete/{id}','ProductoPuestoController@destroy');

//rutas de 'valoracion'
Route::get('/valoracion','ValoracionController@index');
Route::post('/valoracion/create','ValoracionController@store');
Route::get('/valoracion/{id}','ValoracionController@show');
Route::put('/valoracion/update/{id}','ValoracionController@update');
Route::delete('/valoracion/delete/{id}','ValoracionController@destroy');

//rutas de 'transaccion'
Route::get('/transaccion','TransaccionController@index');
Route::post('/transaccion/create','TransaccionController@store');
Route::get('/transaccion/{id}','TransaccionController@show');
Route::put('/transaccion/update/{id}','TransaccionController@update');
Route::delete('/transaccion/delete/{id}','TransaccionController@destroy');

//rutas de 'metodo_de_pago'
Route::get('/metodo_de_pago','MetodoDePagoController@index');
Route::post('/metodo_de_pago/create','MetodoDePagoController@store');
Route::get('/metodo_de_pago/{id}','MetodoDePagoController@show');
Route::put('/metodo_de_pago/update/{id}','MetodoDePagoController@update');
Route::delete('/metodo_de_pago/delete/{id}','MetodoDePagoController@destroy');

//rutas de 'usuario_transaccion'
Route::get('/usuario_transaccion','UsuarioTransaccionController@index');
Route::post('/usuario_transaccion/create','UsuarioTransaccionController@store');
Route::get('/usuario_transaccion/{id}','UsuarioTransaccionController@show');
Route::put('/usuario_transaccion/update/{id}','UsuarioTransaccionController@update');
Route::delete('/usuario_transaccion/delete/{id}','UsuarioTransaccionController@destroy');

//rutas de 'usuario_producto'
Route::get('/usuario_producto','UsuarioProductoController@index');
Route::post('/usuario_producto/create','UsuarioProductoController@store');
Route::get('/usuario_producto/{id}','UsuarioProductoController@show');
Route::put('/usuario_producto/update/{id}','UsuarioProductoController@update');
Route::delete('/usuario_producto/delete/{id}','UsuarioProductoController@destroy');


//rutas de 'productos_promocion'
Route::get('/producto_promocions','ProductoPromocionController@index');
Route::post('/producto_promocions/create','ProductoPromocionController@store');
Route::get('/producto_promocions/{id}','ProductoPromocionController@show');
Route::put('/producto_promocions/update/{id}','ProductoPromocionController@update');
Route::delete('/producto_promocions/delete/{id}','ProductoPromocionController@destroy');
