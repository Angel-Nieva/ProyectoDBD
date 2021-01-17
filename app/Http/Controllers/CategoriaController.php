<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //Obtener todos los datos de una table (get)
    public function index()
    {
        $categoria = Categoria::all()->where('delete',FALSE);
        if($categoria != NULL){
            return response()->json($categoria);
        }
        else {
            $data['titulo'] = '404';
            $data['nombre'] = 'Page not found';
            return response()
                ->view('errors.404',$data,404);
        }
    }


    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
       $categoria = new Categoria();
       $categoria->delete = FALSE;
       
       $fallido=FALSE;
       $mensajeFallos='';
       //Valida que 'nombre' no sea nulo
       if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
       }
       else{
            $categoria->nombre = $request->nombre;
       }
        //Valida que 'descripcion' sea no nulo 
       if(($request->descripcion == NULL) ){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'descripcion' es inválido ";
       }
       else{
            $categoria->descripcion = $request->descripcion;
       }


       // Si se crea
       if($fallido == FALSE){
            $categoria->save();
            return response()->json([
                "message" => "Se ha creado la categoria",
                "id" => $categoria->id
            ]);
       }

       // No se crea
       else{
           return response()->json([
                "message" => $mensajeFallos,
            ]); 
       }
    }

    //Obtener una tupla especifica de una tabla por ID (get)
    public function show($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $categoria = Categoria::find($id);

        //Valida existencia de tupla
        if(($categoria == NULL) || ($categoria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($categoria);
        }

    }


    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $categoria = Categoria::find($id);
        $fallido=FALSE;
        $mensajeFallos='';
        
        //Valida existencia de tupla
        if(($categoria == NULL) || ($categoria->delete==TRUE)){
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
            $categoria->nombre = $request->nombre;
       }
        //Valida que 'descripcion' sea no nulo 
       if(($request->descripcion == NULL) ){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'descripcion' es inválido ";
       }
       else{
            $categoria->descripcion = $request->descripcion;
       }


       // Se actualiza
       if($fallido == FALSE){
            $categoria->save();
            return response()->json([
                "message" => "Se ha actualizado la categoria",
                "id" => $categoria->id
            ]);
       }

       // No se crea
       else{
           return response()->json([
                "message" => $mensajeFallos,
            ]); 
       }
              //Valida que 'nombre' no sea nulo
       if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
       }
       else{
            $categoria->nombre = $request->nombre;
       }
        //Valida que 'descripcion' sea no nulo 
       if(($request->descripcion == NULL) ){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'descripcion' es inválido ";
       }
       else{
            $categoria->descripcion = $request->descripcion;
       }


       // Si se crea
       if($fallido == FALSE){
            $categoria->save();
            return response()->json([
                "message" => "Se ha creado la categoria",
                "id" => $categoria->id
            ]);
       }

       // No se crea
       else{
           return response()->json([
                "message" => $mensajeFallos,
            ]); 
       }
    }

    //Borrar una tupla especifica
    public function destroy($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $categoria = Categoria::find($id);

        //Valida existencia de tupla
        if(($categoria == NULL) || ($categoria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $categoria->delete = TRUE;
        $categoria->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
