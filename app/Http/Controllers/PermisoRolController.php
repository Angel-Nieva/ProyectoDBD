<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermisoRol;
use App\Models\Permiso;
use App\Models\Rol;



class PermisoRolController extends Controller
{
    public function index()
    {
        $permisorol = PermisoRol::all()->where('delete',FALSE);
        return response()->json($permisorol);
    }

    
    public function store(Request $request)
    {
        $permisorol = new PermisoRol();
        $permisorol->delete = FALSE;

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
                $permisorol->id_rols = $request->id_rols;
            }
        }

        if($request->id_permisos == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_permisos' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_permisos)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_permisos' es inválido ";   
            }
            else{
                $permisorol->id_permisos = $request->id_permisos;
            }
        }
        // Verifica que el id_rols exista en rols
        $rol = Rol::find($request->id_rols);
        
        if(($rol == NULL) || ($rol->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'rols' no existe"
            ]);
        }
        // Verifica que el id_permisos exista en permisos
        $permiso = Permiso::find($request->id_permisos);

        if(($permiso == NULL) || ($permiso->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'permisos' no existe"
            ]);
        }
        // Se crea
        if($fallido == FALSE){
            $permisorol->save();
            return response()->json([
                "message" => "Se ha creado el permiso_rol",
                "id" => $permisorol->id
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

        $permisorol = PermisoRol::find($id);

        //Valida existencia de tupla
        if(($permisorol == NULL) || ($permisorol->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($permisorol);
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

        $permisorol = PermisoRol::find($id);

        //Valida existencia de tupla
        if(($permisorol == NULL) || ($permisorol->delete==TRUE)){
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
                $permisorol->id_rols = $request->id_rols;
            }
        }

        if($request->id_permisos == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_permisos' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_permisos)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_permisos' es inválido ";   
            }
            else{
                $permisorol->id_permisos = $request->id_permisos;
            }
        }
        // Verifica que el id_rols exista en rols
        $rol = Rol::find($request->id_rols);
        
        if(($rol == NULL) || ($rol->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'rols' no existe"
            ]);
        }
        // Verifica que el id_permisos exista en permisos
        $permiso = Permiso::find($request->id_permisos);

        if(($permiso == NULL) || ($permiso->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'permisos' no existe"
            ]);
        }

        // Se actualiza
        if($fallido == FALSE){
            $permisorol->save();
            return response()->json([
                "message" => "Se ha actualizado permiso_rol",
                "id" => $permisorol->id
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

        $permisorol = PermisoRol::find($id);

        //Valida existencia de tupla
        if(($permisorol == NULL) || ($permisorol->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $permisorol->delete = TRUE;
        $permisorol->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);

    }
}
