<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\PuestosFeria;
use App\Models\Comuna;
use App\Models\Direccion;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\PermisoRols;
use Validator;

class MainController extends Controller
{
    public function checkLogin(Request $request)
    {
        // Valida que ingresen email y contraseña
    	$request->validate([
		    'email' => 'required',
		    'contraseña' => 'required',
		]);

        //Se obtiene el usuario si es que existe en formate json
    	$usuario=Usuario::all()->where('email',$request->email)->where('contraseña',$request->contraseña);
        
        //Se pasa a array para ver si está vacío
        $data = json_decode($usuario, true);

    	if(!empty($data)){

            //Se obtiene el campo id
            $usuario_id = array_column($data, 'id')[0];

    		return redirect('main/successLogin/'.$usuario_id);
    	}
    	else{
    		return back()->withErrors(['message' => 'Datos de ingreso inválidos']);
    	}
    }

    public function successLogin($id){
    	return view('successLogin');
    }

    public function registro(Request $request){
        $request->validate([
            'email' => 'required',
            'contraseña' => 'required',
            'nombre' => 'required',
            'rut' => 'required',
            'comuna' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'telefono' => 'required',
            //'rol' => 'required',           
        ]);
        $falla=FALSE;
        $mensaje="";

        //Crea registro en tabla usuarios
        app('App\Http\Controllers\UsuarioController')->store($request);
        
        //Busca el usuario recién creado
        $usuario=Usuario::all()->where('email',$request->email)->first();

        //$determina si realmente se creó el usuario y toma el id
        if($usuario!=NULL){
            $usuario_id = $usuario->id;
        }
        else{
            $mensaje=$mensaje."1 ";
            $usuario_id = '0';
            $falla=TRUE;
        }

        //Lo mismo para comuna
        app('App\Http\Controllers\ComunaController')->store($request);
        $comuna=Comuna::all()->where('comuna',$request->comuna)->first();

        if($comuna!=NULL){
            $comuna_id = $comuna->id;
        }
        else{
            $mensaje=$mensaje."2 ";
            $comuna_id = '0';
            $falla=TRUE;
        }

        //Determina el mensaje
        if(!$falla){
            $mensaje=$mensaje.'Se ha creado la cuenta id:'.$usuario_id;   
        }
        else{
            $mensaje=$mensaje.'Hubo problemas';
        }
        
        return redirect('/')->with('mensaje', $mensaje);
    }

}

