<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromocionController extends Controller
{

    public function index()
    {
        $promocion = Promocion::all()->where('delete',FALSE);
        if($promocion != NULL){
            return response()->json($promocion);
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
        $promocion = new Promocion();
        $promocion->delete = FALSE;
        
        $fallido=FALSE;
        $mensajeFallos='';
        //Valida que 'descuento' no sea nulo  y de no serlo que el rango sea valido
        if($request->descuento == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'descuento' es invalido ";
        }
        else if( ctype_digit($request->descuento) > 99 || ctype_digit($request->descuento) < 1 ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El entero del campo 'descuento' es invalido ";
        }
        else{
             $promocion->descuento = $request->descuento;
        }

        //Valida que 'tiempo' no sea nulo  y de no serlo que el rango sea valido
        if($request->tiempo == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'tiempo' es invalido ";
        }
        else if( ctype_digit($request->tiempo) > 100 || ctype_digit($request->tiempo) < 1 ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El entero del campo 'tiempo' es invalido ";
        }
        else{
             $promocion->tiempo = $request->tiempo;
        }        

        //Valida que 'id_usuarios' sea no nulo y de no serlo si es valido
        if($request->id_usuarios == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_usuarios' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_usuarios)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_usuarios' es inválido ";   
            }
            else{
                $promocion->id_usuarios = $request->id_usuarios;
            }
        }
        // Verifica que el id_usuarios exista en direccions
        $usuario = Usuario::find($request->id_usuarios);
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuarios' no existe"
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

        $promocion = Promocion::find($id);
        //Valida existencia de tupla
        if(($promocion == NULL) || ($promocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        else{
            return response()->json($promocion);
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

        $promocion = Promocion::find($id);
        $fallido=FALSE;
        $mensajeFallos='';        
        //Valida existencia de tupla
        if(($promocion == NULL) || ($promocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

            //Valida que 'descuento' no sea nulo  y de no serlo que el rango sea valido
        if($request->descuento == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'descuento' es invalido ";
        }
        else if( ctype_digit($request->descuento) > 99 || ctype_digit($request->descuento) < 1 ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El entero del campo 'descuento' es invalido ";
        }
        else{
             $promocion->descuento = $request->descuento;
        }

        //Valida que 'tiempo' no sea nulo  y de no serlo que el rango sea valido
        if($request->tiempo == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'tiempo' es invalido ";
        }
        else if( ctype_digit($request->tiempo) > 100 || ctype_digit($request->tiempo) < 1 ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El entero del campo 'tiempo' es invalido ";
        }
        else{
             $promocion->tiempo = $request->tiempo;
        }        

        //Valida que 'id_usuarios' sea no nulo y de no serlo si es valido
        if($request->id_usuarios == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_usuarios' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_usuarios)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_usuarios' es inválido ";   
            }
            else{
                $promocion->id_usuarios = $request->id_usuarios;
            }
        }
        // Verifica que el id_usuarios exista en direccions
        $usuario = Usuario::find($request->id_usuarios);
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuarios' no existe"
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

        $promocion = Promocion::find($id);
        //Valida existencia de tupla
        if(($promocion == NULL) || ($promocion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $promocion->delete = TRUE;
        $promocion->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ],201);
    }    
}
