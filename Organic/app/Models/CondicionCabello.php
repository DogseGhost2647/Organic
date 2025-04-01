<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CondicionCabello extends Model
{
    protected $table = 'condicion_cabellos';
    protected $fillable = ['nombre','descripcion'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
