<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new Usuario();
        $usuario->delete = FALSE;
       
        $fallido=FALSE;
        $mensajeFallos='';

       //Valida el 'puntaje'
        if($request->puntaje == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- No ha asignado puntaje";
        }
        $arrayRut = explode("-", $request->rut);
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

        // Si se crea
        if($fallido == FALSE){
            $usuario->save();
            return response()->json([
                "message" => "Se ha creado el usuario",
                "id" => $usuario->id
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
