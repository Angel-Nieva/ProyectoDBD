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
        //
    }

    public function show($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
