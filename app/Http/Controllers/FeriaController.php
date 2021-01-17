<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feria = Feria::all()->where('delete',FALSE);
        if($feria != NULL){
            return response()->json($feria);
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
        $feria = new Feria();
        $feria->delete = FALSE;
        
        $fallido=FALSE;
        $mensajeFallos='';
        //Valida que 'nombre' no sea nulo y de no serlo que el largo sea valido
        if($request->nombre == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'nombre' es invalido ";
        }
        else if( strlen($request->nombre) > 20 || strlen($request->nombre) < 1 ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El largo del campo 'nombre' es invalido ";
        }
        else{
             $feria->nombre = $request->nombre;
        }

        //Valida que 'id_direccions' sea no nulo y de no serlo si es valido
        if($request->id_direccions == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_direccions' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_direccions)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_direccions' es inválido ";   
            }
            else{
                $feria->id_direccions = $request->id_direccions;
            }
        }
        // Verifica que el id_direccions exista en direccions
        $direccion = Direccion::find($request->id_direccions);
        if(($direccion == NULL) || ($direccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'direccions' no existe"
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

        $feria = Feria::find($id);
        //Valida existencia de tupla
        if(($feria == NULL) || ($feria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        else{
            return response()->json($feria);
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

        $feria = Feria::find($id);
        $fallido=FALSE;
        $mensajeFallos='';
        //Valida existencia de tupla
        if(($feria == NULL) || ($feria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        //Valida que 'id_direccions' sea no nulo y de no serlo si es valido
        if($request->id_direccions == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_direccions' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_direccions)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_direccions' es inválido ";   
            }
            else{
                $feria->id_direccions = $request->id_direccions;
            }
        }
        // Verifica que el id_direccions exista en direccions
        $direccion = Direccion::find($request->id_direccions);
        if(($direccion == NULL) || ($direccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'direccions' no existe"
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

        $feria = Feria::find($id);
        //Valida existencia de tupla
        if(($feria == NULL) || ($feria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $feria->delete = TRUE;
        $feria->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ],201);
    }
}
