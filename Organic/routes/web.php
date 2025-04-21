<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\EsAdministrador;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductoController::class, 'inicio'])->name('productos.inicio');
Route::get('/home', [UsuarioController::class, 'home'])->name('home');

Route::middleware(['auth',EsAdministrador::class])->group(function () {
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/index', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/stock', [ProductoController::class, 'showAgregarExistenciasForm'])->name('productos.stock');
Route::post('/productos/stock/agregar', [ProductoController::class, 'agregarExistencias'])->name('productos.stock.agregar');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});

Route::get('/productos2', [ProductoController::class, 'indexClientes'])->name('productos2.index');

Route::middleware(['auth'])->group(function () {

Route::get('/carrito/index', [CarritoController::class, 'index'])->name('carrito.index');
Route::get('/carrito/create', [CarritoController::class, 'create'])->name('carrito.create');
Route::post('/carrito/store', [CarritoController::class, 'store'])->name('carrito.store');
Route::delete('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
Route::delete('/carrito/{id}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
});

//REGISTRO

Route::get('/registro', [RegisteredUserController::class, 'create'])->name('registro');
Route::post('/registro', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



