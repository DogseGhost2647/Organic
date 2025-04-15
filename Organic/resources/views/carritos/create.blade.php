@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Agregar al Carrito</h2>

    <form action="{{ route('carritos.store') }}" method="POST">
        @csrf

        <!-- Usuario -->
        <div class="mb-3">
            <label for="id_usuario" class="form-label">Usuario ID</label>
            <input type="number" name="id_usuario" id="id_usuario" class="form-control" required>
        </div>

        <!-- Producto -->
        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto ID</label>
            <input type="number" name="id_producto" id="id_producto" class="form-control" required>
        </div>

        <!-- Cantidad -->
        <div class="mb-3">
            <label for="cantidad_productos" class="form-label">Cantidad</label>
            <input type="number" name="cantidad_productos" id="cantidad_productos" class="form-control" required>
        </div>

        <!-- Precio total -->
        <div class="mb-3">
            <label for="precio_total" class="form-label">Precio Total</label>
            <input type="number" step="0.01" name="precio_total" id="precio_total" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('carritos.index') }}" class="btn btn-secondary">Cancelar</a>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
