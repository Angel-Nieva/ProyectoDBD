<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function index()
    {
        $rol = Rol::all()->where('delete',FALSE);
        return response()->json($rol);
    }
    
    public function store(Request $request)
    {
       $rol = new Rol();
       $rol->nombre = $request->nombre;
       $rol->delete = FALSE;
       
       if($rol->nombre == NULL){
            return response()->json([
                "message" => "El campo 'nombre' está vacío"
            ]);
       }
       else{
            $rol->save();
            return response()->json([
                "message" => "Se ha creado el rol",
                "id" => $rol->id
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

        $rol = Rol::find($id);

        //Valida existencia de tupla
        if(($rol == NULL) || ($rol->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($rol);
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

        $rol = Rol::find($id);
        
        //Valida existencia de tupla
        if(($rol == NULL) || ($rol->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        //Valida que 'nombre' no esté vacío
        if ($request->nombre == NULL){
            return response()->json([
                "message" => "El campo 'nombre' está vacío"
            ]);
        }
        $rol->nombre = $request->nombre;
        $rol->delete = FALSE;
        $rol->save();
        return response()->json([
            "message" => "El dato se ha actualizado",
            "id" => $rol->id
        ]);
    }

   
    public function destroy($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $rol = Rol::find($id);

        //Valida existencia de tupla
        if(($rol == NULL) || ($rol->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $rol->delete = TRUE;
        $rol->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);

    }
}
