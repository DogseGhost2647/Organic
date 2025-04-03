<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre','descripcion','precio','cantidad_disponible','id_categoria','id_condicion'];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function carrito(){
        return $this->HasMany(Carrito::class, 'id_carrito');
    }

    public function tipoCabello(){
        return $this->HasMany(TipoCabello::class, 'id_tipo');
    }

    public function condicionCabello(){
        return $this->belongsTo(CondicionCabello::class, 'id_condicion');
    }

    public $timestamps=false;

}
