<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongTo(Usuario::class);
    }
    public function producto_promocion(){
        return $this->hasMany(ProductoPromocion::class);
    }
}
