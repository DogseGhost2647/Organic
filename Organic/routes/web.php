<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Models\Carrito;
use App\Models\Producto;

Route::get('/', [ProductoController::class, 'inicio'])->name('productos.inicio');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/index', [ProductoController::class, 'index'])->name('productos.index');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/', [CarritoController::class, 'index'])->name('carritos.inicio');

Route::get('/carritos/create', [CarritoController::class, 'create'])->name('carritos.create');
Route::post('/carritos/store', [CarritoController::class, 'store'])->name('carritos.store');
Route::get('/carritos/index', [CarritoController::class, 'index'])->name('carritos.index');
Route::get('/carritos/{carrito}/edit', [CarritoController::class, 'edit'])->name('carritos.edit');
Route::put('/carritos/{carrito}', [CarritoController::class, 'update'])->name('carritos.update');
Route::delete('/carritos/{carrito}', [CarritoController::class, 'destroy'])->name('carritos.destroy');