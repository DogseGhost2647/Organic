@extends('layouts.app4')

@section('content')
<div class="container">
    <div class="container center">
        <h2>Productos disponibles</h2>
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