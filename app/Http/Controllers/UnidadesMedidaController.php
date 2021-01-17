<?php

namespace App\Http\Controllers;
use App\Models\UnidadesMedida;
use Illuminate\Http\Request;

class UnidadesMedidaController extends Controller
{


    //Obtener todos los datos de una table (get)
    public function index()
    {
        $unidadesmedida = Unidadesmedida::all()->where('delete',FALSE);
        if($unidadesmedida != NULL){
            return response()->json($unidadesmedida);
        }
        else {
            $data['titulo'] = '404';
            $data['nombre'] = 'Page not found';
            return response()
            ->view('errors.404',$data,404);
        }
    }

        //Crear una nueva tupla (post)
    //Crear una nueva tupla (post)
    public function store(Request $request)
    {
       $unidadesmedida = new UnidadesMedida();
       $unidadesmedida->delete = FALSE;
       
       $fallido=FALSE;
       $mensajeFallos='';
       //Valida que 'tipo' no sea nulo
       if($request->tipo == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'tipo' está vacío ";
       }
       else{
            $unidadesmedida->tipo = $request->tipo;
       }
        //Valida que 'cantidad' sea no nulo 
        if(($request->cantidad == NULL) || (ctype_digit($request->cantidad) != TRUE)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'cantidad' es inválido ";
       }
       else{
            $unidadesmedida->cantidad = $request->cantidad;
       }


       // Si se crea
       if($fallido == FALSE){
            $unidadesmedida->save();
            return response()->json([
                "message" => "Se ha creado la tabla unidades_medidas",
                "id" => $unidadesmedida->id
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

        $unidadesmedida = UnidadesMedida::find($id);

        //Valida existencia de tupla
        if(($unidadesmedida == NULL) || ($unidadesmedida->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($unidadesmedida);
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

        $unidadesmedida = UnidadesMedida::find($id);

        //Valida existencia de tupla
        if(($unidadesmedida == NULL) || ($unidadesmedida->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $fallido=FALSE;
        $mensajeFallos='';
        //Valida que 'tipo' no sea nulo
        if($request->tipo == NULL){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'tipo' está vacío ";
        }
        else{
             $unidadesmedida->tipo = $request->tipo;
        }
         //Valida que 'cantidad' sea no nulo 
         if(($request->cantidad == NULL) || (ctype_digit($request->cantidad) != TRUE)){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'cantidad' es inválido ";
        }
        else{
             $unidadesmedida->cantidad = $request->cantidad;
        }
 
 
        // Se actualiza
        if($fallido == FALSE){
             $unidadesmedida->save();
             return response()->json([
                 "message" => "Se ha actualizado la tabla unidades_medidas",
                 "id" => $unidadesmedida->id
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

        $unidadesmedida = UnidadesMedida::find($id);

        //Valida existencia de tupla
        if(($unidadesmedida == NULL) || ($unidadesmedida->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $unidadesmedida->delete = TRUE;
        $unidadesmedida->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
