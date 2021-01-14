<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    public function subcategorias(){
        return
        $this->belongsTo('App\Models\Subcategoria');
    }
    public function unidades_medidas(){
        return
        $this->belongsTo('App\Models\UnidadMedida');
    }
}
