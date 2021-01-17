<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //Obtener todos los datos de una table (get)
    public function index()
    {
        $producto = Producto::all()->where('delete',FALSE);
        if($producto != NULL){
            return response()->json($producto);
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
