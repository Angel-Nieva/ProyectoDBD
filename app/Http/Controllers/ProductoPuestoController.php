<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoPuestoController extends Controller
{

    public function index()
    {
        $productopuesto = ProductoPuesto::all()->where('delete',FALSE);
        if($productopuesto != NULL){
            return response()->json($productopuesto);
        }
        else {
            $data['titulo'] = '404';
            $data['nombre'] = 'Page not found';
            return response()
                ->view('errors.404',$data,404);
        }
    }


    public function store(Request $request)
    {
        $productopuesto = new ProductoPuesto();
        $productopuesto->delete = FALSE;
        
        $fallido=FALSE;
        $mensajeFallos='';
         //Valida que 'precio' no sea nulo  y de no serlo que sea un entero
        if($request->precio == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'precio' es invalido ";
        }
        else if( !ctype_digit($request->precio)){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'precio' debe ser un numero mayor a 0";
        }
        else{
             $productopuesto->precio = $request->precio;
        }

        //Valida que 'stock' no sea nulo  y de no serlo que sea un entero
        if($request->stock == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'stock' es invalido ";
        }
        else if( !ctype_digit($request->stock)){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'stock' debe ser un numero mayor a 0";
        }
        else{
             $productopuesto->stock = $request->stock;
        }

        //Valida que 'id_productos' sea no nulo y de no serlo si es valido
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
                $productopuesto->id_productos = $request->id_productos;
            }
        }
        // Verifica que el id_productos exista en direccions
        $producto = Producto::find($request->id_productos);
        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'productos' no existe"
            ]);
        }
        
        //Valida que 'id_puestos_ferias' sea no nulo y de no serlo si es valido
        if($request->id_puestos_ferias == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_puestos_ferias' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_puestos_ferias)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_puestos_ferias' es inválido ";   
            }
            else{
                $productopuesto->id_puestos_ferias = $request->id_puestos_ferias;
            }
        }
        // Verifica que el id_puestos_ferias exista en direccions
        $puestosferia = PuestosFeria::find($request->id_puestos_ferias);
        if(($puestosferia == NULL) || ($puestosferia->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'puestos_ferias' no existe"
            ]);
        }

        // Si se crea
        if($fallido == FALSE){
            $feria->save();
            return response()->json([
                "message" => "Se ha creado la feria",
                "id" => $feria->id
            ],202);
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

        $productopuesto = ProductoPuesto::find($id);
        //Valida existencia de tupla
        if(($productopuesto == NULL) || ($productopuesto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        else{
            return response()->json($productopuesto);
        } 
    }

    public function update(Request $request, $id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $productopuesto = ProductoPuesto::find($id);
        $fallido=FALSE;
        $mensajeFallos='';        
        //Valida existencia de tupla
        if(($productopuesto == NULL) || ($productopuesto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
             //Valida que 'precio' no sea nulo  y de no serlo que sea un entero
        if($request->precio == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'precio' es invalido ";
        }
        else if( !ctype_digit($request->precio)){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'precio' debe ser un numero mayor a 0";
        }
        else{
             $productopuesto->precio = $request->precio;
        }

        //Valida que 'stock' no sea nulo  y de no serlo que sea un entero
        if($request->stock == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'stock' es invalido ";
        }
        else if( !ctype_digit($request->stock)){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'stock' debe ser un numero mayor a 0";
        }
        else{
             $productopuesto->stock = $request->stock;
        }

        //Valida que 'id_productos' sea no nulo y de no serlo si es valido
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
                $productopuesto->id_productos = $request->id_productos;
            }
        }
        // Verifica que el id_productos exista en direccions
        $producto = Producto::find($request->id_productos);
        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'productos' no existe"
            ]);
        }
        
        //Valida que 'id_puestos_ferias' sea no nulo y de no serlo si es valido
        if($request->id_puestos_ferias == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_puestos_ferias' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_puestos_ferias)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_puestos_ferias' es inválido ";   
            }
            else{
                $productopuesto->id_puestos_ferias = $request->id_puestos_ferias;
            }
        }
        // Verifica que el id_puestos_ferias exista en direccions
        $puestosferia = PuestosFeria::find($request->id_puestos_ferias);
        if(($puestosferia == NULL) || ($puestosferia->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'puestos_ferias' no existe"
            ]);
        }

        // Si se crea
        if($fallido == FALSE){
            $feria->save();
            return response()->json([
                "message" => "Se ha creado la feria",
                "id" => $feria->id
            ],202);
        }

        // No se crea
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

        $productopuesto = ProductoPuesto::find($id);
        //Valida existencia de tupla
        if(($productopuesto == NULL) || ($productopuesto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $productopuesto->delete = TRUE;
        $productopuesto->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ],201);
    }    
}
