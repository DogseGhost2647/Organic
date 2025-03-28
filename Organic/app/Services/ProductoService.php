<?php

namespace App\Services;
use App\Contracts\ProductoServiceInterface;
use App\Models\Producto;

class ProductoService implements ProductoServiceInterface{
    public function listarProductos(){
        return Producto::all();
    }

    public function obtenerProducto(int $id){
        return Producto::findOrFail($id);
    }

    public function crearProducto(array $datos){
        return Producto::create($datos);
    }

    public function actualizarProducto(int $id, array $datos){
        $producto = Producto::findOrFail($id);
        $producto->update($datos);
        return $producto;
    }

    public function eliminarProducto(int $id){
        $producto = Producto::findOrFail($id);
        $producto->delete();
    }
}