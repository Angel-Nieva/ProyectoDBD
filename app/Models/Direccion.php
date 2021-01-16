<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;
    public function usuario(){
    	return $this->belongsTo(Usuario::class);
    }
    public function comuna(){
    	return $this->belongsTo(Comuna::class);
    }
    public function feria(){
    	return $this->hasOne(Feria::class);
    }
}
