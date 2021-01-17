<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioTransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariotransaccion = UsuarioTransaccion::all()->where('delete',FALSE);
        if($usuariotransaccion != NULL){
            return response()->json($usuariotransaccion);
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
        $usuariotransaccion = new UsuarioTransaccion();
        $usuariotransaccion->delete = FALSE;

        $fallido=FALSE;
        $mensajeFallos='';

        if($request->id_usuario == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_usuario' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_usuario)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_usuario' es inválido ";   
            }
            else{
                $usuariotransaccion->id_usuario = $request->id_usuario;
            }
        }

        if($request->id_transaccion == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_transaccion' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_transaccion)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_transaccion' es inválido ";   
            }
            else{
                $usuariotransaccion->id_transaccion = $request->id_transaccion;
            }
        }
        // Verifica que el id_usuario exista en usuario
        $usuario = Usuario::find($request->id_usuario);
        
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuario' no existe"
            ]);
        }
        // Verifica que el id_transaccion exista en transaccion
        $transaccion = Transaccion::find($request->id_transaccion);

        if(($transaccion == NULL) || ($transaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'transaccion' no existe"
            ]);
        }
        // Se crea
        if($fallido == FALSE){
            $usuariotransaccion->save();
            return response()->json([
                "message" => "Se ha creado la usuario_transaccion",
                "id" => $usuariotransaccion->id
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

        $usuariotransaccion = UsuarioTransaccion::find($id);

        //Valida existencia de tupla
        if(($usuariotransaccion == NULL) || ($usuariotransaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($usuariotransaccion);
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

        $usuariotransaccion = UsuarioTransaccion::find($id);

        //Valida existencia de tupla
        if(($usuariotransaccion == NULL) || ($usuariotransaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $fallido=FALSE;
        $mensajeFallos='';

        if($request->id_usuario == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_usuario' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_usuario)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_usuario' es inválido ";   
            }
            else{
                $usuariotransaccion->id_usuario = $request->id_usuario;
            }
        }

        if($request->id_transaccion == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_transaccion' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_transaccion)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_transaccion' es inválido ";   
            }
            else{
                $usuariotransaccion->id_transaccion = $request->id_transaccion;
            }
        }
        // Verifica que el id_usuario exista en usuario
        $usuario = Usuario::find($request->id_usuario);
        
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuario' no existe"
            ]);
        }
        // Verifica que el id_transaccion exista en transaccion
        $transaccion = Transaccion::find($request->id_transaccion);

        if(($transaccion == NULL) || ($transaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'transaccion' no existe"
            ]);
        }
        // Se actualiza
        if($fallido == FALSE){
            $usuariotransaccion->save();
            return response()->json([
                "message" => "Se ha actualizado la usuario_transaccion",
                "id" => $usuariotransaccion->id
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

        $usuariotransaccion = UsuarioTransaccion::find($id);

        //Valida existencia de tupla
        if(($usuariotransaccion == NULL) || ($usuariotransaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $usuariotransaccion->delete = TRUE;
        $usuariotransaccion->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}