<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';

    protected $fillable = ['id_usuario'];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function productos(){
        return $this->belongsTo(Producto::class,'carrito_productos','id_carrito','id_producto')->withPivot('cantidad')->withTimeStamps();
    }
}
