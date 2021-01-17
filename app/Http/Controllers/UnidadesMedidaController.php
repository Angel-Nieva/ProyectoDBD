<?php

namespace App\Http\Controllers;
use App\Models\UnidadesMedida;
use Illuminate\Http\Request;

class UnidadesMedidaController extends Controller
{


    //Obtener todos los datos de una table (get)
    public function index()
    {
        $unidadesmedida = Unidadesmedida::all()->where('delete',FALSE);
        if($unidadesmedida != NULL){
            return response()->json($unidadesmedida);
        }
        else {
            $data['titulo'] = '404';
            $data['nombre'] = 'Page not found';
            return response()
            ->view('errors.404',$data,404);
        }
    }

    //Obtener una tupla especifica de una tabla por ID (get)
    public function show($id)
    {
        //
    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        //
    }

    //Borrar una tupla especifica
    public function destroy($id)
    {
        //
    }
}
