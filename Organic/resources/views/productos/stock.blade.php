@extends('layouts.app6')

@section('content')
<div class="card" style="width: 50rem;">
    <div class="card-body">
        <h5 class="card-title">Agregar Existencias</h5>

        <!-- Formulario para agregar existencias -->
        <form method="POST" action="{{ route('productos.stock.agregar') }}">
            @csrf

            <!-- Selector de productos -->
            <div class="form-group">
                <label for="producto_id">Producto:</label>
                <select name="producto_id" id="producto_id" class="form-control" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Cantidad a agregar -->
            <div class="form-group">
                <label for="cantidad_disponible">Cantidad a Agregar:</label>
                <input type="number" id="cantidad_disponible" name="cantidad_disponible" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Agregar Stock</button>
        </form>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
@endsection
