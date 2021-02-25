<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPuesto extends Model
{
    use HasFactory;
    public function puestosferia(){
        return $this->belongsTo(PuestosFeria::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
