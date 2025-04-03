<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarritoController;

Route::resource('carrito', CarritoController::class);

Route::get('/', function () {
    return view('welcome');
});