<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioTransaccion extends Model
{
    use HasFactory;
    public function transaccion(){
        return
        $this->belongsTo('App\Models\Transaccion');
    }
    public function usuario(){
        return
        $this->belongsTo('App\Models\Usuario');
    }
}
