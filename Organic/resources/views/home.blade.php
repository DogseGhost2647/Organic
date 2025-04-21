@extends('layouts.app4')

@section('content')

<!-- Hero principal -->
<section class="text-center" style="background: url('/storage/banner-organic.jpg') no-repeat center center; background-size: cover;">
    <div class="container py-5" style="background-color: rgba(255, 255, 255, 0.8); border-radius: 15px;">
        <h1 class="fw-bold display-4">
            Bienvenido a 
            <span style="color: #6c9724;">Or-ganic</span>
        </h1>
        <p class="lead text-muted">
            Cuidamos tu belleza de forma natural.
        </p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="/registro" class="btn" style="background-color: #6c9724; color: white; padding: 10px 24px; border-radius: 30px; font-size: 18px;">
                Registrarse
            </a>
            <a href="/login" class="btn" style="border: 2px solid #6c9724; color: #6c9724; padding: 10px 24px; border-radius: 30px; font-size: 18px;">
                Iniciar Sesión
            </a>
        </div>
    </div>
</section>

<!-- Sección de Productos -->
<div class="container py-5">
    <div class="mb-5">
        <h2 class="fw-bold text-center mb-3" style="color: #6c9724;">Productos Disponibles</h2>
        <p class="text-center text-muted">Elige productos 100% naturales para realzar la belleza y vitalidad de tu cabello.</p>
    </div>

    <div class="row g-4">
        @foreach ($productos as $producto)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 hover-card" style="transition: transform 0.3s, box-shadow 0.3s;">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="Imagen del producto" style="object-fit: cover; height: 260px; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold" style="color: #6c9724;">{{ $producto->nombre }}</h5>
                        <p class="card-text text-muted">{{ $producto->descripcion }}</p>
                        <p class="mt-auto mb-2">
                            <strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}
                        </p>
                        <form action="{{ route('carrito.store') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                            <input type="hidden" name="cantidad_productos" value="1">
                            <button type="submit" class="btn" style="background-color: #6c9724; color: white; border-radius: 25px;">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Sección de agradecimiento -->
<section class="text-center py-5 join-section">
    <h2 class="fw-bold mb-3">¡Gracias por ser parte de Organic!</h2>
    <p>Mantente conectado y aprovecha los descuentos exclusivos que tenemos para ti. ¡Tu cabello merece lo mejor y en Organic lo sabemos!</p>
    <a href="/productos" class="btn btn-light px-4 py-2 rounded-pill">Explorar productos</a>
</section>

<style>
    .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(108, 151, 36, 0.3);
    }
</style>

@endsection
