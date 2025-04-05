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
        return $this->belongsTo(Usuario::class,'id_usuario', 'id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto', 'id');
    }

    public $timestamps=false;
    
}
