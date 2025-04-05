<?php

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
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
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