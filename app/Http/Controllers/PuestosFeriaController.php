<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuestosFeria;
use App\Models\Usuario;
use App\Models\Feria;
class PuestosFeriaController extends Controller
{

    public function index()
    {
        $puestoferia = PuestosFeria::all()->where('delete',FALSE);
        if($puestoferia != NULL){
            return response()->json($puestoferia);
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
        $puestoferia = new PuestosFeria();
        $puestoferia->delete = FALSE;
        
        $fallido=FALSE;
        $mensajeFallos='';
         //Valida que 'nombre' no sea nulo  y de no serlo que el rango sea valido
        if($request->nombre == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'nombre' es invalido ";
        }
        else if( strlen($request->nombre) > 20 || strlen($request->nombre) < 1 ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El largo del campo 'nombre' es invalido ";
        }
        else{
             $puestoferia->nombre = $request->nombre;
        }

        //Valida que 'id_usuarios' sea no nulo y de no serlo si es valido
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
                $puestoferia->id_usuarios = $request->id_usuarios;
            }
        }
        // Verifica que el id_usuarios exista en direccions
        $usuario = Usuario::find($request->id_usuarios);
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuarios' no existe"
            ]);
        }
        
        //Valida que 'id_ferias' sea no nulo y de no serlo si es valido
        if($request->id_ferias == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_ferias' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_ferias)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_ferias' es inválido ";   
            }
            else{
                $puestoferia->id_ferias = $request->id_ferias;
            }
        }
        // Verifica que el id_ferias exista en direccions
        $feria = Feria::find($request->id_ferias);
        if(($feria == NULL) || ($feria->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'ferias' no existe"
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

        $puestoferia = PuestosFeria::find($id);
        //Valida existencia de tupla
        if(($puestoferia == NULL) || ($puestoferia->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        else{
            return response()->json($puestoferia);
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

        $puestoferia = PuestosFeria::find($id);
        $fallido=FALSE;
        $mensajeFallos='';        
        //Valida existencia de tupla
        if(($puestoferia == NULL) || ($puestoferia->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        //Valida que 'nombre' no sea nulo  y de no serlo que el rango sea valido
        if($request->nombre == NULL ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'nombre' es invalido ";
        }
        else if( strlen($request->nombre) > 20 || strlen($request->nombre) < 1 ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El largo del campo 'nombre' es invalido ";
        }
        else{
             $puestoferia->nombre = $request->nombre;
        }

        //Valida que 'id_usuarios' sea no nulo y de no serlo si es valido
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
                $puestoferia->id_usuarios = $request->id_usuarios;
            }
        }
        // Verifica que el id_usuarios exista en direccions
        $usuario = Usuario::find($request->id_usuarios);
        if(($usuario == NULL) || ($usuario->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'usuarios' no existe"
            ]);
        }
        
        //Valida que 'id_ferias' sea no nulo y de no serlo si es valido
        if($request->id_ferias == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_ferias' está vacío ";
        }
        if($fallido == FALSE){
            if(ctype_digit($request->id_ferias)==FALSE){
                $fallido=TRUE;
                $mensajeFallos=$mensajeFallos."- El campo 'id_ferias' es inválido ";   
            }
            else{
                $puestoferia->id_ferias = $request->id_ferias;
            }
        }
        // Verifica que el id_ferias exista en direccions
        $feria = Feria::find($request->id_ferias);
        if(($feria == NULL) || ($feria->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'ferias' no existe"
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

        $puestoferia = PuestosFeria::find($id);
        //Valida existencia de tupla
        if(($puestoferia == NULL) || ($puestoferia->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $puestoferia->delete = TRUE;
        $puestoferia->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ],201);
    }
}
