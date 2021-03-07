<?php

namespace App\Http\Controllers;
use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaccion = Transaccion::all()->where('delete',FALSE);
        return response()->json($transaccion);
    }

    public function store(Request $request)
    {
        $transaccion = new Transaccion();
        $transaccion->delete = FALSE;
       
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida el 'monto_pagado'
        if($request->monto_pagado == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'monto_pagado' es invalido ";
        }
        else if( !ctype_digit($request->monto_pagado)){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'monto_pagado' debe ser un numero mayor a 0";
        }
        else{
             $transaccion->monto_pagado = $request->monto_pagado;
        } 

        //Valida  'fecha_pago' 
        if($request->fecha_pago == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'fecha_pago' está vacío ";
        }
        else if(!strtotime($request->fecha_pago)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'fecha_pago' es inválido ";
        }
        else{
            $transaccion->fecha_pago = $request->fecha_pago;
        }
        // Si se crea
        if($fallido == FALSE){
            $transaccion->save();
            return redirect ('/pagoExitoso');
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

        $transaccion = Transaccion::find($id);

        //Valida existencia de tupla
        if(($transaccion == NULL) || ($transaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($transaccion);
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

        $transaccion = Transaccion::find($id);

        //Valida existencia de tupla
        if(($transaccion == NULL) || ($transaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida el 'monto_pagado'
        if($request->monto_pagado == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'monto_pagado' es invalido ";
        }
        else if( !ctype_digit($request->monto_pagado)){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'monto_pagado' debe ser un numero mayor a 0";
        }
        else{
             $transaccion->monto_pagado = $request->monto_pagado;
        } 

        //Valida  'fecha_pago' 
        if($request->fecha_pago == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'fecha_pago' está vacío ";
        }
        else if(!strtotime($request->fecha_pago)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'fecha_pago' es inválido ";
        }
        else{
            $transaccion->fecha_pago = $request->fecha_pago;
        }

         //Se actualiza
        if($fallido == FALSE){
            $transaccion->save();
            return response()->json([
                "message" => "Se ha actualizado la transaccion",
                "id" => $transaccion->id
            ]);
        }
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

        $transaccion = Transaccion::find($id);

        //Valida existencia de tupla
        if(($transaccion == NULL) || ($transaccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $transaccion->delete = TRUE;
        $transaccion->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
