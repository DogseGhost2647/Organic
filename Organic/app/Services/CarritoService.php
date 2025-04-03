<?php

namespace App\Services;

use App\Models\Carrito;

class CarritoService
{
    public function obtenerCarrito()
    {
        return Carrito::with(['usuario', 'producto'])->get();
    }

    public function agregarProducto($data)
    {
        return Carrito::create($data);
    }

    public function actualizarProducto(Carrito $carrito, $data)
    {
        return $carrito->update($data);
    }

    public function eliminarProducto(Carrito $carrito)
    {
        return $carrito->delete();
    }
}
