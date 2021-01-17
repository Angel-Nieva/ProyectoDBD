<?php

namespace App\Http\Controllers;
use App\Models\TransaccionsProducto;
use App\Models\Transaccion;
use App\Models\Producto;
use Illuminate\Http\Request;

class TransaccionsProductoController extends Controller
{
    //Obtener todos los datos de una table (get)
    public function index()
    {
        $transaccionsproducto = TransaccionsProducto::all()->where('delete',FALSE);
        if($transaccionsproducto != NULL){
            return response()->json($transaccionsproducto);
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
        $transaccionsproducto = new TransaccionsProducto();
        $transaccionsproducto->delete = FALSE;

        $fallido=FALSE;
        $mensajeFallos='';

        if($request->id_transaccions == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_transaccions' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_transaccions)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_transaccions' es inválido ";   
            }
            else{
                $transaccionsproducto->id_transaccions = $request->id_transaccions;
            }
        }

        if($request->id_productos == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_productos' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_productos)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_productos' es inválido ";   
            }
            else{
                $transaccionsproducto->id_productos = $request->id_productos;
            }
        }
        // Verifica que el id_transaccions exista en transaccions
        $transaccion = Transaccion::find($request->id_transaccions);
        
        if(($transaccion == NULL) || ($transaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'transaccions' no existe"
            ]);
        }
        // Verifica que el id_productos exista en productos
        $producto = Producto::find($request->id_productos);

        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'productos' no existe"
            ]);
        }
        // Se crea
        if($fallido == FALSE){
            $transaccionsproducto->save();
            return response()->json([
                "message" => "Se ha creado la transaccions_productos",
                "id" => $transaccionsproducto->id
            ]);
        }

        // No se crea
        else{
           return response()->json([
                "message" => $mensajeFallos,
            ]); 
        }

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

        $transaccionsproducto = TransaccionsProducto::find($id);

        //Valida existencia de tupla
        if(($transaccionsproducto == NULL) || ($transaccionsproducto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($transaccionsproducto);
        }

    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $transaccionsproducto = TransaccionsProducto::find($id);

        //Valida existencia de tupla
        if(($transaccionsproducto == NULL) || ($transaccionsproducto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $fallido=FALSE;
        $mensajeFallos='';

        if($request->id_transaccions == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_transaccions' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_transaccions)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_transaccions' es inválido ";   
            }
            else{
                $transaccionsproducto->id_transaccions = $request->id_transaccions;
            }
        }

        if($request->id_productos == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_productos' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_productos)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_productos' es inválido ";   
            }
            else{
                $transaccionsproducto->id_productos = $request->id_productos;
            }
        }
        // Verifica que el id_transaccions exista en transaccions
        $transaccion = Transaccion::find($request->id_transaccions);
        
        if(($transaccion == NULL) || ($transaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'transaccions' no existe"
            ]);
        }
        // Verifica que el id_productos exista en productos
        $producto = Producto::find($request->id_productos);

        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'productos' no existe"
            ]);
        }
        // Se actualiza
        if($fallido == FALSE){
            $transaccionsproducto->save();
            return response()->json([
                "message" => "Se ha actualizado la transaccions_productos",
                "id" => $transaccionsproducto->id
            ]);
        }

        // No se actualiza
        else{
           return response()->json([
                "message" => $mensajeFallos,
            ]); 
        }
    }

    //Borrar una tupla especifica
    public function destroy($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $transaccionsproducto = TransaccionsProducto::find($id);

        //Valida existencia de tupla
        if(($transaccionsproducto == NULL) || ($transaccionsproducto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $transaccionsproducto->delete = TRUE;
        $transaccionsproducto->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
