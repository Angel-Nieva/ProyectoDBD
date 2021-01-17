<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioproducto = UsuarioProducto::all()->where('delete',FALSE);
        if($usuarioproducto != NULL){
            return response()->json($usuarioproducto);
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
        $usuarioproducto = new UsuarioProducto();
        $usuarioproducto->delete = FALSE;

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
                $usuarioproducto->id_usuario = $request->id_usuario;
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
                $usuarioproducto->id_productos = $request->id_productos;
            }
        }
        // Verifica que el id_usuario exista en usuario
        $usuario = Usuario::find($request->id_usuario);
        
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuario' no existe"
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
            $usuarioproducto->save();
            return response()->json([
                "message" => "Se ha creado la usuario_productos",
                "id" => $usuarioproducto->id
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

        $usuarioproducto = UsuarioProducto::find($id);

        //Valida existencia de tupla
        if(($usuarioproducto == NULL) || ($usuarioproducto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($usuarioproducto);
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

        $usuarioproducto = UsuarioProducto::find($id);

        //Valida existencia de tupla
        if(($usuarioproducto == NULL) || ($usuarioproducto->delete==TRUE)){
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
                $usuarioproducto->id_usuario = $request->id_usuario;
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
                $usuarioproducto->id_productos = $request->id_productos;
            }
        }
        // Verifica que el id_usuario exista en usuario
        $usuario = Usuario::find($request->id_usuario);
        
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuario' no existe"
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
            $usuarioproducto->save();
            return response()->json([
                "message" => "Se ha actualizado la usuario_productos",
                "id" => $usuarioproducto->id
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

        $usuarioproducto = UsuarioProducto::find($id);

        //Valida existencia de tupla
        if(($usuarioproducto == NULL) || ($usuarioproducto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $usuarioproducto->delete = TRUE;
        $usuarioproducto->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
