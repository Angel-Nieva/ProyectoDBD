<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Validator;

class MainController extends Controller
{
    public function checkLogin(Request $request)
    {
    	$request->validate([
		    'email' => 'required',
		    'contraseña' => 'required',
		]);

    	$usuario=Usuario::all()->where('email',$request->email)->where('contraseña',$request->contraseña);

        $data = json_decode($usuario, true);
    	if(!empty($data)){
    		return redirect('main/successLogin');
    	}
    	else{
    		return back()->withErrors(['message' => 'Datos de ingreso inválidos']);
    	}
    }

    public function successLogin(){
    	return view('successLogin');
    }
}

