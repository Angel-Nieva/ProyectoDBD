<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use App\Models\Usuario;
use App\Models\Comuna;

class DireccionController extends Controller
{
    public function index()
    {
        $direccion = Direccion::all()->where('delete',FALSE);
        return response()->json($direccion);
    }

    
    public function store(Request $request)
    {
        $direccion = new Direccion();
        $direccion->delete = FALSE;
       
        $fallido=FALSE;
        $mensajeFallos='';

        if($request->id_comunas == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_comunas' está vacío ";
        }

        if($fallido == FALSE){
            if(ctype_digit($request->id_comunas)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_comunas' es inválido ";   
            }
            else{
                $direccion->id_comunas = $request->id_comunas;
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
                $direccion->id_usuarios = $request->id_usuarios;
            }
        }

         // Verifica que el id_transaccions exista en transaccions
        $usuario = Usuario::find($request->id_usuarios);
        
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuarios' no existe"
            ]);
        }

         // Verifica que el id_transaccions exista en transaccions
        $comuna = Comuna::find($request->id_comunas);
        
        if(($comuna == NULL) || ($comuna->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'comunas' no existe"
            ]);
        }

        //Valida que 'calle' no sea nulo
        if($request->calle == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'calle' está vacío ";
        }
        else{
            $direccion->calle = $request->calle;
        } 
        //Valida 'numero' que sea valido y no nulo 
        if(($request->numero == NULL) || (ctype_digit($request->numero) != TRUE)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'numero' es inválido ";
        }
        else{
            $direccion->numero = $request->numero;
        }

        // Si se crea
        if($fallido == FALSE){
            $direccion->save();
            return response()->json([
                "message" => "Se ha creado la direccion",
                "id" => $direccion->id
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

        $direccion = Direccion::find($id);

        //Valida existencia de tupla
        if(($direccion == NULL) || ($direccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($direccion);
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

        $direccion = Direccion::find($id);
        $fallido=FALSE;
        $mensajeFallos='';
        
        //Valida existencia de tupla
        if(($direccion == NULL) || ($direccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        //Valida que 'calle' no sea nulo
        if ($request->calle == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'calle' está vacío ";
        }
        else{
            $direccion->calle = $request->calle;
        }
        //Valida 'numero' que sea valido y no nulo 
        if(($request->numero == NULL) || (ctype_digit($request->numero) != TRUE)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'numero' es inválido ";
        }
        else{
            $direccion->numero = $request->numero;
        }

        //Se actualiza
        if($fallido == FALSE){
            $direccion->save();
            return response()->json([
                "message" => "Se ha actualizado la direccion",
                "id" => $direccion->id
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

        $direccion = Direccion::find($id);

        //Valida existencia de tupla
        if(($direccion == NULL) || ($direccion->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $direccion->delete = TRUE;
        $direccion->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }

}
