<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolUsuario;
use App\Models\Rol;
use App\Models\Usuario;

class RolUsuarioController extends Controller
{
    public function index()
    {
        $rolusuario = RolUsuario::all()->where('delete',FALSE);
        return response()->json($rolusuario);
    }

    
    public function store(Request $request)
    {
        
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
