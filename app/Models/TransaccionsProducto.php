<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionsProducto extends Model
{
    use HasFactory;
    public function producto(){
        return
        $this->belongsTo('App\Models\Producto');
    }
    public function transaccion(){
        return
        $this->belongsTo('App\Models\Transaccion');
    }
}
