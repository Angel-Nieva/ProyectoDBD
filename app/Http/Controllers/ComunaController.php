<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;

class ComunaController extends Controller
{
 
    public function index()
    {
        $comuna = Comuna::all()->where('delete',FALSE);
        if($comuna != NULL){
            return response()->json($comuna);
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
        $comuna = new Comuna();
        $comuna->delete = FALSE;
        
        $fallido=FALSE;
        $mensajeFallos='';
        //Valida que 'nombre' no sea nulo
        if($request->nombre == NULL){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
        }
        else{
             $comuna->nombre = $request->nombre;
        }

        // Si se crea
       if($fallido == FALSE){
            $comuna->save();
            return response()->json([
                "message" => "Se ha creado la comuna",
                "id" => $comuna->id
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

        $comuna = Comuna::find($id);
        //Valida existencia de tupla
        if(($comuna == NULL) || ($comuna->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        else{
            return response()->json($comuna);
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
        
        $comuna = Comuna::find($id);
        $fallido=FALSE;
        $mensajeFallos='';
        //Valida existencia de tupla
        if(($comuna == NULL) || ($comuna->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
       //Valida que 'nombre' no sea nulo
       if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
       }
       else{
            $comuna->nombre = $request->nombre;
       }
       // Se actualiza
       if($fallido == FALSE){
            $comuna->save();
            return response()->json([
                "message" => "Se ha actualizado la comuna",
                "id" => $comuna->id
            ]);
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

        $comuna = Comuna::find($id);

        //Valida existencia de tupla
        if(($comuna == NULL) || ($comuna->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $comuna->delete = TRUE;
        $comuna->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
