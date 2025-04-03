@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="container center">
    <h1 class="fw-bold">Bienvenido a <span style="color: #333;">Or-ganic</span></h1>
    <p class="fs-5">
        Bienvenido a tu tienda virtual, donde encontrarás una exclusiva selección de productos 100% naturales 
        diseñados para realzar la belleza y salud de tu cabello.
    </p>
    </div>
    
    <button class="btn-register">Registrarse</button>
    <a href="#" class="login-link">Iniciar Sesión</a>
    <div class="container swiper">
        <h2>Productos mas vendidos!</h2>
    </div>
    <div class="row">
        @foreach ($productos as $producto)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}"> 
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
                    <a href="#" class="btn btn-primary">Agregar al carrito</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection