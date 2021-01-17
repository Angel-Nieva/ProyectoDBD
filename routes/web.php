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
    return view('welcome');
});

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
Route::put('/comunas/update/{id}','ComunaController@update');
Route::delete('/comunas/update/{id}','ComunaController@destroy');