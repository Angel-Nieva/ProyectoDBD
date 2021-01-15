<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermisoRol;


class PermisoRolController extends Controller
{
    public function index()
    {
        $permisorol = PermisoRol::all()->where('delete',FALSE);
        return response()->json($permisorol);
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
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
