<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestosFeria extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function productopuesto(){
        return $this->hasMany(ProductoPuesto::class);
    }
    public function feria(){
        return $this->belongsTo(Feria::class);
    }
}
