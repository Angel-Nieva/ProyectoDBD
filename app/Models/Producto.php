<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    public function subcategoria(){
        return
        $this->belongsTo('App\Models\Subcategoria');
    }
    public function unidades_medida(){
        return
        $this->belongsTo('App\Models\UnidadesMedida');
    }
    public function transaccions_producto(){
        return
        $this->hasMany('App\Models\TransaccionProducto');
    }
    public function productos_puesto(){
        return
        $this->hasMany('App\Models\ProductoPuesto');
    }
    public function producto_promocion(){
        return
        $this->hasMany('App\Models\ProductoPromocion');
    }
    public function usuario_producto(){
        return
        $this->hasMany('App\Models\UsuarioProducto');
    }
}
