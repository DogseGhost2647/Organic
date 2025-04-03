<?php

namespace App\Services;

use App\Contracts\CarritoServiceInterface;
use App\Models\Carrito;

class CarritoService implements CarritoServiceInterface
{
    public function listarCarritos(){
        return Carrito::all();
    }
    public function obtenerCarrito(int $id){
        return Carrito::findOrFail($id);
    }

    public function crearCarrito($datos)
    {
        return Carrito::create($datos);
    }

    public function actualizarCarrito(int $id, array $datos)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->update($datos);
        return $carrito;
    }

    public function eliminarCarrito(int $id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();
    }
}
