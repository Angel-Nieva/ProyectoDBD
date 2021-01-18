<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valoracion;
use App\Models\Usuario;
use App\Models\Transaccion;
class ValoracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valoracion = Valoracion::all()->where('delete',FALSE);
        return response()->json($valoracion);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valoracion = new Valoracion();
        $valoracion->delete = FALSE;
       
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida el 'puntaje'
        if($request->puntaje == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- No ha asignado puntaje";
        }
        if($fallido == FALSE){    
            if((is_numeric($request->puntaje)) && ($request->puntaje >= 1) && ($request->puntaje <= 5) ){
                $valoracion->puntaje = $request->puntaje;
                   
            }
            else{
                
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'puntaje' es inválido ";
            }
        } 

        //Valida que 'comentario' no sea nulo
        if($request->comentario == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'comentario' está vacío ";
        }
        else{
            $valoracion->comentario = $request->comentario;
        }

       
        // Si se crea
        if($fallido == FALSE){
            $valoracion->save();
            return response()->json([
                "message" => "Se ha creado una valoracion",
                "id" => $valoracion->id
            ]);
        }
        // No se crea
        else{
           return response()->json([
                "message" => $mensajeFallos,
            ]); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $valoracion = Valoracion::find($id);

        //Valida existencia de tupla
        if(($valoracion == NULL) || ($valoracion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($valoracion);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $valoracion = Valoracion::find($id);

        //Valida existencia de tupla
        if(($valoracion == NULL) || ($valoracion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida el 'puntaje'
        if($request->puntaje == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'puntaje' está vacío ";
        }
        if($fallido == FALSE){    
            if((is_numeric($request->puntaje)) && ($request->puntaje >= 1) && ($request->puntaje <= 5) ){
                $valoracion->puntaje = $request->puntaje;
                   
            }
            else{
                
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'puntaje' es inválido ";
            }
        } 

        //Valida que 'comentario' no sea nulo
        if($request->comentario == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'comentario' está vacío ";
        }
        else{
            $valoracion->comentario = $request->comentario;
        }

         //Se actualiza
        if($fallido == FALSE){
            $valoracion->save();
            return response()->json([
                "message" => "Se ha actualizado la valoracion",
                "id" => $valoracion->id
            ]);
        }
        else{
            return response()->json([
                "message" => $mensajeFallos,
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $valoracion = Valoracion::find($id);

        //Valida existencia de tupla
        if(($valoracion == NULL) || ($valoracion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $valoracion->delete = TRUE;
        $valoracion->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
