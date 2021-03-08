<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\RolUsuario;
use App\Models\Rol;

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
        $rolusuario = RolUsuario::find($id);
        $rol = Rol::find($rolusuario->id_rols);
        //Valida existencia de tupla
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            if($rol->nombre_rol == "Feriante"){
                return view('home',compact('usuario'));
            }
            else{
                return view('successLogin',compact('usuario'));
            }
        }
    }

    public function actualizar_view($id){
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
            return view('actualizar',compact('usuario'));
        }
    }

   
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        //Valida existencia de tupla
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return back()->withErrors(['message' => 'Datos de ingreso inválidos']);
        }
        
        $fallido=FALSE;
        $mensajeFallos='';


       //Valida 'contraseña'
        if($request->contraseña == $usuario->contraseña){
            if((ctype_digit($request->telefono) == FALSE) && ($request->telefono != NULL)){
                $fallido=TRUE; 
            }
            else{
                $usuario->telefono = $request->telefono;
            }
            if(((strpos($request->email,'.') == FALSE) || (strpos($request->email,'@') == FALSE) ||
            (substr_count($request->email,'@')>1))
            && ($request->email != NULL)){
                $fallido=TRUE;
            }
            if($request->email != NULL){
                $explodeEmailArroba = explode("@", $request->email);
                if(count($explodeEmailArroba)>2){
                    $fallido=TRUE;
                }
                else{
                    $usuario->email = $request->email; 
                }
            }
            if($request->contraseña2 != NULL){
                $usuario->contraseña = $request->contraseña2;
            }
            //Se actualiza
            if($fallido == FALSE){
                $usuario->save();
                return app('App\Http\Controllers\UsuarioController')->show($id);
            }
            else{
                return back()->withErrors(['message' => 'Datos de ingreso inválidos']);
            }
        }
        else{
            return back()->withErrors(['message' => 'Contraseña incorrecta']);
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
