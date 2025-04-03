<?php

namespace App\Contracts;

interface CarritoServiceInterface {
    public function listarCarritos();
    public function obtenerCarrito(int $id);
    public function crearCarrito(array $datos);
    public function actualizarCarrito(int $id, array $datos);
    public function eliminarCarrito(int $id);
}