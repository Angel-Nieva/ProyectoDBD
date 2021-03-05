<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuario = Usuario::all()->where('delete',FALSE);
        return response()->json($usuario);
    }

    
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->delete = FALSE;
       
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida el 'rut'
        if($request->rut == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'rut' está vacío ";
        }
        if((strpos($request->rut,'.') == FALSE)){
            $arrayRut = explode("-", $request->rut);
        }
        else{
            $fallido=TRUE;
            $mensajeFallos='El rut ingresado es invalido';
        }
        if($fallido == FALSE){    
            if((is_numeric($arrayRut[0]) == FALSE)|| ((is_numeric($arrayRut[1]) == FALSE) && ($arrayRut[1] != 'k') && ($arrayRut[1] != 'K')) ){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'rut' es inválido ";   
            }
            else{
                $usuario->rut = $request->rut;
            }
        } 

        //Valida que 'nombre' no sea nulo
        if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
        }
        else{
            $usuario->nombre = $request->nombre;
        }

       //Valida 'contraseña'
        if($request->contraseña == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'contraseña' está vacío ";
        }
        else{
            $usuario->contraseña = $request->contraseña;
        }

       //Valida 'telefono'
        if($request->telefono == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'telefono' está vacío ";
        }
        if($fallido == FALSE){
            if((ctype_digit($request->telefono) == FALSE) || (strlen($request->telefono)>15) || (strlen($request->telefono)<6)){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'telefono' es inválido ";   
            }
            else{
                $usuario->telefono = $request->telefono;
            }
        }


        $usuario->reputacion = 0;

        //Valida 'email'
        if($request->email == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'email' está vacío ";
        }

        if(((strpos($request->email,'.') == FALSE) || (strpos($request->email,'@') == FALSE) ||
            (substr_count($request->email,'@')>1))
            && ($fallido == FALSE))
        {
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'email' es inválido ";
        }

        if($fallido == FALSE){
            $explodeEmailArroba = explode("@", $request->email);
            $explodeEmailPunto = explode(".", $explodeEmailArroba[1]);
            if(count($explodeEmailArroba)>2){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'email' es inválido ";
            }
            else{
                $usuario->email = $request->email; 
            }
        }

        // Si se crea
        if($fallido == FALSE){
            $usuario->save();
            return redirect('/');
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

        $usuario = Usuario::find($id);

        //Valida existencia de tupla
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return view('home',compact('usuario'));
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

        $usuario = Usuario::find($id);

        //Valida existencia de tupla
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida el 'rut'
        if($request->rut == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'rut' está vacío ";
        }
        $arrayRut = explode("-", $request->rut);
        if($fallido == FALSE){    
            if((is_numeric($arrayRut[0]) == FALSE) || ((is_numeric($arrayRut[1]) == FALSE) && ($arrayRut[1] != 'k') && ($arrayRut[1] != 'K'))){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'rut' es inválido ";   
            }
            else{
                $usuario->rut = $request->rut;
            }
        } 

        //Valida que 'nombre' no sea nulo
        if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
        }
        else{
            $usuario->nombre = $request->nombre;
        }

       //Valida 'contraseña'
        if($request->contraseña == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'contraseña' está vacío ";
        }
        else{
            $usuario->contraseña = $request->contraseña;
        }

       //Valida 'telefono'
        if($request->telefono == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'telefono' está vacío ";
        }
        if($fallido == FALSE){
            if((ctype_digit($request->telefono) == FALSE) || (strlen($request->telefono)>15) || (strlen($request->telefono)<6)){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'rut' es inválido ";   
            }
            else{
                $usuario->telefono = $request->telefono;
            }
        }

        //Valida 'reputacion'
        if($request->reputacion == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'reputacion' está vacío ";
        }
        if($fallido == FALSE){
            if($request->reputacion>6 || $request->reputacion<0){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'rut' es inválido ";
            }
             else{
                $usuario->reputacion = $request->reputacion;
            }
        }
        //Valida 'email'
        if($request->email == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'email' está vacío ";
        }

        if(((strpos($request->email,'.') == FALSE) || (strpos($request->email,'@') == FALSE) ||
            (substr_count($request->email,'.')>1) || (substr_count($request->email,'@')>1))
            && ($fallido == FALSE))
        {
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'email' es inválido ";
        }

        if($fallido == FALSE){
            $explodeEmailArroba = explode("@", $request->email);
            $explodeEmailPunto = explode(".", $explodeEmailArroba[1]);
            if((count($explodeEmailArroba)>2) || (count($explodeEmailPunto)>2)){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'email' es inválido ";
            }
            else{
                $usuario->email = $request->email; 
            }
        }

         //Se actualiza
        if($fallido == FALSE){
            $usuario->save();
            return response()->json([
                "message" => "Se ha actualizado el usuario",
                "id" => $usuario->id
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

        $usuario = Usuario::find($id);

        //Valida existencia de tupla
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        $usuario->delete = TRUE;
        $usuario->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }

}
