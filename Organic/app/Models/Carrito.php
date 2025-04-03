<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';

    protected $fillable = ['id_usuario', 'cantidad'];

    public function usuario(){
        return $this->HasMany(Usuario::class,'id_usuario');
    }

    public function carritoProductos(){
        return $this->HasMany(Producto::class,'carrito_productos','id_carrito','id_producto')->withPivot('cantidad')->withTimeStamps();
    }

    public function productos(){
        return $this->belongsTo(Producto::class,'id_producto');
    }
}
