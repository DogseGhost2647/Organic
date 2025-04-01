<?php

namespace App\Contracts;

interface ProductoServiceInterface {
    public function listarProductos();
    public function obtenerProducto(int $id);
    public function crearProducto(array $datos);
    public function actualizarProducto(int $id, array $datos);
    public function eliminarProducto(int $id);
}