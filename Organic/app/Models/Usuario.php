<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{

    protected $table='usuarios';
    protected $fillable=['nombre','correo','telefono','direccion','password','rol'];

    protected $hidden=['password','remeber_token'];

    protected $casts = ['password' => 'hased',]

    public function carrito(){
        return $this->belongsTo(Carrito::class,'id_carrito');
    }

}
