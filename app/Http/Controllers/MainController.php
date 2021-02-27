<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
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
}

