<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuarios';
    protected $fillable=['nombre','correo','telefono','direccion','rol'];

    protected $hidden=['password'];

    public function carrito(){
        return $this->belongsTo(Carrito::class,'id_carrito');
    }

}
