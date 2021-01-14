<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    use HasFactory;
    public function rol(){
    	return $this->belongsTo(Rol::class);
    }
    public function usuario(){
    	return $this->belongsTo(Usuario::class);
    }
}
