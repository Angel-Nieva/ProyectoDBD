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

        //Crear una nueva tupla (post)
        public function store(Request $request)
        {
            //
        }

    //Obtener una tupla especifica de una tabla por ID (get)
    public function show($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $unidadesmedida = UnidadesMedida::find($id);

        //Valida existencia de tupla
        if(($unidadesmedida == NULL) || ($unidadesmedida->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($unidadesmedida);
        }

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
