<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    use HasFactory;
    public function puestosferia(){
        return $this->hasMany(PuestosFeria::class);
    }
    public function direccion(){
        return $this->hasOne(Direccion::class);
    }
}
