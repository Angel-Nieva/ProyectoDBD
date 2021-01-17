<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoDePago extends Model
{
    use HasFactory;
    public function usuario(){
        return
        $this->belongsTo('App\Models\Usuario');

    public function transaccion(){
        return
        $this->hasMany('App\Models\Transaccion');
    }
}
