<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoPromocion;
use App\Models\Producto;
use App\Models\Promocion;

class ProductoPromocionController extends Controller
{
    public function index()
    {
        $productopromocion = ProductoPromocion::all()->where('delete',FALSE);
        return response()->json($productopromocion);
    }

    
    public function store(Request $request, $id_producto, $id_promocion)
    {
        $productopromocion = new productopromocion();
        $productopromocion->delete = FALSE;

        $fallido=FALSE;
        $mensajeFallos='';

        if($id_producto == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_productos' está vacío ";
        }

        else{
            $productopromocion->id_productos = $id_producto;
        }

        if($id_promocion == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_promocions' está vacío ";
        }
        else{
            $productopromocion->id_promocions = $id_promocion;
        }
        // Verifica que el id_productos exista en rols
        $producto = Producto::find($id_producto);
        
        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'productos' no existe"
            ]);
        }
        // Verifica que el id_permisos exista en permisos
        $promocion = Promocion::find($id_promocion);

        if(($promocion == NULL) || ($promocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'promocion' no existe"
            ]);
        }
        // Se crea
        if($fallido == FALSE){
            $productopromocion->save();
            return response()->json([
                "message" => "Se ha creado el producto_promocion",
                "id" => $productopromocion->id
            ]);
        }

        // No se crea
        else{
           return response()->json([
                "message" => $mensajeFallos,
            ]); 
        }

    }

    public function show($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $productopromocion = ProductoPromocion::find($id);

        //Valida existencia de tupla
        if(($productopromocion == NULL) || ($productopromocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($productopromocion);
        }
    }

   
    public function update(Request $request, $id)
    {
        //Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $productopromocion = ProductoPromocion::find($id);

        //Valida existencia de tupla
        if(($productopromocion == NULL) || ($productopromocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $fallido=FALSE;
        $mensajeFallos='';

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
                $productopromocion->id_productos = $request->id_productos;
            }
        }

        if($request->id_promocions == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_promocions' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_promocions)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_promocions' es inválido ";   
            }
            else{
                $productopromocion->id_promocions = $request->id_promocions;
            }
        }
        // Verifica que el id_productos exista en rols
        $producto = Producto::find($request->id_productos);
        
        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'productos' no existe"
            ]);
        }
        // Verifica que el id_permisos exista en permisos
        $promocion = Promocion::find($request->id_promocions);

        if(($promocion == NULL) || ($promocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'promocion' no existe"
            ]);
        }

        // Se actualiza
        if($fallido == FALSE){
            $productopromocion->save();
            return response()->json([
                "message" => "Se ha actualizado producto_promocion",
                "id" => $productopromocion->id
            ]);
        }
        // No se actualiza
        else{
            return response()->json([
                "message" => $mensajeFallos,
            ]); 
        }
    }

   
    public function destroy($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $productopromocion = ProductoPromocion::find($id);

        //Valida existencia de tupla
        if(($productopromocion == NULL) || ($productopromocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $productopromocion->delete = TRUE;
        $productopromocion->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);

    }

}
