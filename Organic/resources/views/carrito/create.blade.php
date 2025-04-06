@extends('layouts.app5')

@section('content')
<div class="w-100 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="container" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Agregar producto al carrito</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('carrito.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="id_producto" class="form-label">Selecciona un producto</label>
                <select name="id_producto" id="id_producto" class="form-select" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">
                            {{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad_productos" class="form-label">Cantidad</label>
                <input type="number" name="cantidad_productos" id="cantidad_productos" class="form-control" value="1" min="1" required>
            </div>

            <button type="submit" class="btn btn-register w-100">Agregar al carrito</button>
        </form>
    </div>
</div>
@endsection
