<?php

namespace App\Http\Controllers;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    //Obtener todos los datos de una table (get)
    public function index()
    {
        $subcategoria = Subcategoria::all()->where('delete',FALSE);
        if($subcategoria != NULL){
            return response()->json($subcategoria);
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

        $subcategoria = Subcategoria::find($id);

        //Valida existencia de tupla
        if(($subcategoria == NULL) || ($subcategoria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($subcategoria);
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
