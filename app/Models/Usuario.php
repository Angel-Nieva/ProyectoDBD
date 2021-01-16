<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public function direccion(){
    	return $this->hasMany(Direccion::class);
    }
    public function rolusuario(){
    	return $this->hasMany(RolUsuario::class);
    }
    public function puestosferia(){
    	return $this->hasMany(PuestosFeria::class);
    }
    public function promocion(){
    	return $this->hasMany(Promocion::class);
    }
    public function usuarioproducto(){
    	return $this->hasMany(UsuarioProducto::class);
    }
    public function usuariotransaccion(){
    	return $this->hasMany(UsuarioTransaccion::class);
    }
    public function valoracion(){
    	return $this->hasMany(Valoracion::class);
    }
    public function metododepago(){
    	return $this->hasMany(MetodoDePago::class);
    }
}
