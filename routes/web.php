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