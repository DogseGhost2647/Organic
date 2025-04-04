<?php

use Illuminate\Support\Facades\Route;


=======
Route::get('/', [ProductoController::class, 'inicio'])->name('productos.inicio');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/index', [ProductoController::class, 'index'])->name('productos.index');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');


//REGISTRO

Route::get('/regist', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);