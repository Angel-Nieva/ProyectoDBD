<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;

class PermisoController extends Controller
{
    public function index()
    {
        $permiso = Permiso::all()->where('delete',FALSE);
        return response()->json($permiso);
    }
    
    public function store(Request $request)
    {
       $permiso = new Permiso();
       $permiso->descripcion = $request->descripcion;
       $permiso->delete = FALSE;
       
       if($permiso->descripcion == NULL){
            return response()->json([
                "message" => "El campo 'descripción' está vacío"
            ]);
       }
       else{
            $permiso->save();
            return response()->json([
                "message" => "Se ha creado el permiso",
                "id" => $permiso->id
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

        $permiso = Permiso::find($id);

        //Valida existencia de tupla
        if(($permiso == NULL) || ($permiso->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($permiso);
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

        $permiso = Permiso::find($id);
        
        //Valida existencia de tupla
        if(($permiso == NULL) || ($permiso->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        //Valida que 'descripcion' no esté vacío
        if ($request->descripcion == NULL){
            return response()->json([
                "message" => "El campo 'descripción' está vacío"
            ]);
        }
        $permiso->descripcion = $request->descripcion;
        $permiso->delete = FALSE;
        $permiso->save();
        return response()->json([
            "message" => "El dato se ha actualizado",
            "id" => $permiso->id
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

        $permiso = Permiso::find($id);

        //Valida existencia de tupla
        if(($permiso == NULL) || ($permiso->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $permiso->delete = TRUE;
        $permiso->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);

    }
}
