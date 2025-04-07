@extends('layouts.app4')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-5">Productos disponibles</h2>

    <div class="row">
        @foreach ($productos as $producto)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="mt-auto"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
                        <form action="{{ route('carrito.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
                            <input type="hidden" name="cantidad_productos" value="1">

                            <button type="submit" class="btn btn-primary w-100 mt-2">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $productos->links() }}
    </div>
</div>
@endsection
