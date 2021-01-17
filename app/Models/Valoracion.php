<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;
    public function usuario(){
        return
        $this->belongsTo('App\Models\Usuario');
    }
    public function transaccion(){
        return
        $this->hasOne('App\Models\Transaccion');
    }
}
