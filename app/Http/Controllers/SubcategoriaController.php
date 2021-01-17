<?php

namespace App\Http\Controllers;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    //Obtener todos los datos de una table (get)
    public function index()
    {
        $subcategoria = Subcategoria::all()->where('delete',FALSE);
        if($subcategoria != NULL){
            return response()->json($subcategoria);
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
       $subcategoria = new Subcategoria();
       $subcategoria->delete = FALSE;
       
       $fallido=FALSE;
       $mensajeFallos='';
       //Valida que 'nombre' no sea nulo
       if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
       }
       else{
            $subcategoria->nombre = $request->nombre;
       }
        //Valida que 'descripcion' sea no nulo 
       if(($request->descripcion == NULL) ){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'descripcion' es inválido ";
       }
       else{
            $subcategoria->descripcion = $request->descripcion;
       }


    //valida que id_categorias sea no nulo
    if($request->id_categorias == NULL){
        $fallido=TRUE;
        $mensajeFallos=$mensajeFallos."- El campo 'id_categorias' está vacío ";
    }

    if($fallido == FALSE){
        if(ctype_digit($request->id_categorias)==FALSE){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_categorias' es inválido ";   
        }
        else{
            $subcategoria->id_categorias = $request->id_categorias;
        }
    }

       //Valida que id existe en subcategorias
    $categoria = Categoria::find($request->id_categorias);
    if(($categoria == NULL) || ($categoria->delete==TRUE)){
        return response()->json([
            "message" => "El dato en 'categoria' no existe"
        ]);
    }
       // Si se crea
       if($fallido == FALSE){
            $subcategoria->save();
            return response()->json([
                "message" => "Se ha creado la subcategoria",
                "id" => $subcategoria->id
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

        $subcategoria = Subcategoria::find($id);

        //Valida existencia de tupla
        if(($subcategoria == NULL) || ($subcategoria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($subcategoria);
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

        $subcategoria = Subcategoria::find($id);

        //Valida existencia de tupla
        if(($subcategoria == NULL) || ($subcategoria->delete==TRUE)){
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
             $subcategoria->nombre = $request->nombre;
        }
         //Valida que 'descripcion' sea no nulo 
        if(($request->descripcion == NULL) ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'descripcion' es inválido ";
        }
        else{
             $subcategoria->descripcion = $request->descripcion;
        }
 
 
     //valida que id_categorias sea no nulo
     if($request->id_categorias == NULL){
         $fallido=TRUE;
         $mensajeFallos=$mensajeFallos."- El campo 'id_categorias' está vacío ";
     }
 
     if($fallido == FALSE){
         if(ctype_digit($request->id_categorias)==FALSE){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'id_categorias' es inválido ";   
         }
         else{
             $subcategoria->id_categorias = $request->id_categorias;
         }
     }
 
        //Valida que id existe en subcategorias
     $categoria = Categoria::find($request->id_categorias);
     if(($categoria == NULL) || ($categoria->delete==TRUE)){
         return response()->json([
             "message" => "El dato en 'categoria' no existe"
         ]);
     }
        // Se actualiza
        if($fallido == FALSE){
             $subcategoria->save();
             return response()->json([
                 "message" => "Se ha actualizado la subcategoria",
                 "id" => $subcategoria->id
             ]);
        }
 
        // No se actualiza
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

        $subcategoria = Subcategoria::find($id);

        //Valida existencia de tupla
        if(($subcategoria == NULL) || ($subcategoria->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $subcategoria->delete = TRUE;
        $subcategoria->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
