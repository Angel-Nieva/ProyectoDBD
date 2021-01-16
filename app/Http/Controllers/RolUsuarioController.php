<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolUsuario;
use App\Models\Rol;
use App\Models\Usuario;

class RolUsuarioController extends Controller
{
    public function index()
    {
        $rolusuario = RolUsuario::all()->where('delete',FALSE);
        return response()->json($rolusuario);
    }

    
    public function store(Request $request)
    {
        $rolusuario = new RolUsuario();
        $rolusuario->delete = FALSE;

        $fallido=FALSE;
        $mensajeFallos='';

        if($request->id_rols == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_rols' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_rols)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_rols' es inválido ";   
            }
            else{
                $rolusuario->id_rols = $request->id_rols;
            }
        }

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
                $rolusuario->id_usuarios = $request->id_usuarios;
            }
        }
        // Verifica que el id_rols exista en rols
        $rol = Rol::find($request->id_rols);
        
        if(($rol == NULL) || ($rol->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'rols' no existe"
            ]);
        }
        // Verifica que el id_usuarios exista en usuarios
        $usuario = usuario::find($request->id_usuarios);

        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuarios' no existe"
            ]);
        }
        // Se crea
        if($fallido == FALSE){
            $rolusuario->save();
            return response()->json([
                "message" => "Se ha creado el rol_usuario",
                "id" => $rolusuario->id
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
        //Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $rolusuario = RolUsuario::find($id);

        //Valida existencia de tupla
        if(($rolusuario == NULL) || ($rolusuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($rolusuario);
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

        $rolusuario = RolUsuario::find($id);

        //Valida existencia de tupla
        if(($rolusuario == NULL) || ($rolusuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $fallido=FALSE;
        $mensajeFallos='';

        if($request->id_rols == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_rols' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_rols)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_rols' es inválido ";   
            }
            else{
                $rolusuario->id_rols = $request->id_rols;
            }
        }

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
                $rolusuario->id_usuarios = $request->id_usuarios;
            }
        }
        // Verifica que el id_rols exista en rols
        $rol = Rol::find($request->id_rols);
        
        if(($rol == NULL) || ($rol->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'rols' no existe"
            ]);
        }
        // Verifica que el id_usuarios exista en usuarios
        $usuario = usuario::find($request->id_usuarios);

        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuarios' no existe"
            ]);
        }
         // Se actualiza
        if($fallido == FALSE){
            $rolusuario->save();
            return response()->json([
                "message" => "Se ha actualizado rol_usuario",
                "id" => $rolusuario->id
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
        //Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $rolusuario = RolUsuario::find($id);

        //Valida existencia de tupla
        if(($rolusuario == NULL) || ($rolusuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $rolusuario->delete = TRUE;
        $rolusuario->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
