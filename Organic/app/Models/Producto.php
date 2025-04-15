<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre','descripcion','precio','cantidad_disponible','id_categoria','id_condicion','id_tipo','imagen'];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function carritos(){
        return $this->HasMany(Carrito::class, 'id_producto');
    }

    public function tipoCabello(){
        return $this->HasMany(TipoCabello::class, 'id_tipo');
    }

    public function condicionCabello(){
        return $this->belongsTo(CondicionCabello::class, 'id_condicion');
    }

    public $timestamps=false;

    public function setCantidadDisponibleAttribute($value){
    $this->attributes['cantidad_disponible'] = $value;
    $this->attributes['estado'] = $value > 0 ? 'disponible' : 'agotado';
    }
}
