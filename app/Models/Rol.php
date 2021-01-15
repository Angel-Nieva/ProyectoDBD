<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    public function rolusuario(){
    	return $this->hasMany(RolUsuario::class);
    }
    public function permisorol(){
    	return $this->hasMany(PermisoRol::class);
    }
}
