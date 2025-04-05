<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCabello extends Model
{
    protected $table = 'tipo_cabellos';
    protected $fillable = ['nombre','descripcion'];
    public $timestamps = false;

    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
