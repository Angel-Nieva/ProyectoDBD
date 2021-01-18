<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoDePago;
class MetodoDePagoController extends Controller
{
    // Arreglo con bancos para validar
    //$array_bancos= array('Banco De Chile', 'Banco Santander', 'Banco Fallabella','Banco Estado','Banco de Credito e Inversiones','Banco Scotciabank');

    public function index()
    {
        $metododepago = MetodoDePago::all()->where('delete',FALSE);
        return response()->json($metododepago);
    }

    public function store(Request $request)
    {
        $metododepago = new MetodoDePago();
        $metododepago->delete = FALSE;
       
        $fallido=FALSE;
        $mensajeFallos='';

        //Valida que 'nombre' no sea nulo
        if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
        }
        else{
            $metododepago->nombre = $request->nombre;
        }

        //Valida el 'cuenta'
        if($request->cuenta == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'cuenta' está vacío ";
        }
        
        if($fallido == FALSE){    
            if(is_numeric($request->cuenta) == FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'cuenta' es inválido ";   
            }
            else{
                $metododepago->cuenta = $request->cuenta;
            }
        }

       //Valida 'banco'
        if($request->banco == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'banco' está vacío ";
        }
        
        if($fallido == FALSE){    
            //if(in_array($request->banco,$array_bancos){
            $metododepago->banco = $request->banco;
                  
            //}
            //else{
            //    $fallido=TRUE;
            //    $mensajeFallos=$mensajeFallos."- El campo 'rut' es inválido "; 
                
            //}
        }
        
        //Valida 'tipo_tarjeta'
        if($request->tipo_tarjeta == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'tipo_tarjeta' está vacío ";
        }
        else{
            $metododepago->tipo_tarjeta = $request->tipo_tarjeta;
        }

        // Si se crea
        if($fallido == FALSE){
            $metododepago->save();
            return response()->json([
                "message" => "Se ha creado el metododepago",
                "id" => $metododepago->id
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

        $metododepago = MetodoDePago::find($id);

        //Valida existencia de tupla
        if(($metododepago == NULL) || ($metododepago->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($metododepago);
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

        $metododepago = MetodoDePago::find($id);

        //Valida existencia de tupla
        if(($metododepago == NULL) || ($metododepago->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida que 'nombre' no sea nulo
        if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
        }
        else{
            $metododepago->nombre = $request->nombre;
        }

        //Valida el 'cuenta'
        if($request->cuenta == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'cuenta' está vacío ";
        }
        
        if($fallido == FALSE){    
            if(is_numeric($request->cuenta) == FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'cuenta' es inválido ";   
            }
            else{
                $metododepago->cuenta = $request->cuenta;
            }
        }

        //Valida 'banco'
        if($request->banco == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'banco' está vacío ";
        }

        if($fallido == FALSE){    
            //if(in_array($request->banco,$array_bancos){
            $metododepago->banco = $request->banco;
                  
            //}
            //else{
            //    $fallido=TRUE;
            //    $mensajeFallos=$mensajeFallos."- El campo 'rut' es inválido "; 
                
            //}
        }
        
        //Valida 'tipo_tarjeta'
        if($request->tipo_tarjeta == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'tipo_tarjeta' está vacío ";
        }
        else{
            $metododepago->tipo_tarjeta = $request->tipo_tarjeta;
        }

         //Se actualiza
        if($fallido == FALSE){
            $metododepago->save();
            return response()->json([
                "message" => "Se ha actualizado el metododepago",
                "id" => $metododepago->id
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

        $metododepago = MetodoDePago::find($id);

        //Valida existencia de tupla
        if(($metododepago == NULL) || ($metododepago->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $metododepago->delete = TRUE;
        $metododepago->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
