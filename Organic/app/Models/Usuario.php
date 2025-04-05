<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Authenticatable implements AuthenticatableContract
{

    protected $table='usuarios';
    protected $fillable=['nombre','correo','telefono','direccion','password','rol'];

    protected $hidden=['password','remember_token'];

    protected $casts = ['password' => 'hashed'];

    public function getAuthIdentifierName()
    {
    return 'correo';
    }

    public function carrito(){
        return $this->belongsTo(Carrito::class,'id_carrito');
    }
    
    public function username()
    {
    return 'correo';
    }

}
