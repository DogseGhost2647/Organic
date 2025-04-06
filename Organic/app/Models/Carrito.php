<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';

    protected $fillable = ['id_usuario', 'id_producto', 'cantidad_productos', 'precio_total'];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function producto() {
        return $this->belongsTo(Producto::class, 'id_producto');
    }    

    protected static function booted()
    {
        static::creating(function ($carrito) {
            $producto = Producto::find($carrito->id_producto);
            $carrito->precio_total = $producto->precio * $carrito->cantidad_productos;
        });

        static::updating(function ($carrito) {
            $producto = Producto::find($carrito->id_producto);
            $carrito->precio_total = $producto->precio * $carrito->cantidad_productos;
        });
    }
}
