<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoRol extends Model
{
    use HasFactory;
    public function permiso(){
    	return $this->belongsTo(Permiso::class);
    }
    public function rol(){
    	return $this->belongsTo(Rol::class);
    }
}
