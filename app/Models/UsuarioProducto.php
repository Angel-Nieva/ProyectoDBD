<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioProducto extends Model
{
    use HasFactory;
    public function usuario(){
        return
        $this->belongsTo('App\Models\Usuario');
    }
    public function producto(){
        return
        $this->belongsTo('App\Models\Producto');
    }
}
