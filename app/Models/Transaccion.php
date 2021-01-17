<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    
    public function valoracion(){
        return
        $this->belongsTo('App\Models\Valoracion');
    }
    public function transaccions_producto(){
        return
        $this->hasMany('App\Models\TransaccionsProducto');
    }
    public function usuario_transaccion(){
        return
        $this->hasMany('App\Models\UsuarioTransaccion');
    }
    public function metodo_de_pago(){
        return
        $this->belongsTo('App\Models\MetodoDePago');
    }
}
