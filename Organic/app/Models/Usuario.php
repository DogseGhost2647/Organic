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

    public function carritos(){
        return $this->hasMany(Carrito::class,'id_usuario');
    }
    
    public function username()
    {
    return 'correo';
    }

    public function isAdmin()
    {
        return $this->rol === 'administrador';
    }


}
