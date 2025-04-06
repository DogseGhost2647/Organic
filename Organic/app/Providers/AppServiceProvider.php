<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ProductoServiceInterface;
use App\Services\ProductoService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductoServiceInterface::class, ProductoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cantidadCarrito = 0;
    
            if (Auth::check()) {
                $cantidadCarrito = Carrito::where('id_usuario', Auth::id())->sum('cantidad_productos');
            }
    
            $view->with('cantidadCarrito', $cantidadCarrito);
        });
    }
}
