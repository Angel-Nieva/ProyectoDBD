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
        $this->belongsTo('App\Models\UnidadesMedida');
    }
    public function transaccions_productos(){
        return
        $this->hasMany('App\Models\TransaccionProducto');
    }
    public function productos_puestos(){
        return
        $this->hasMany('App\Models\ProductoPuesto');
    }
    public function producto_promocions(){
        return
        $this->hasOne('App\Models\ProductoPromocion');
    }
}
