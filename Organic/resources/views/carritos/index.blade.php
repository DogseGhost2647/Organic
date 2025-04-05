@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Carritos</h2>
        <a href="{{ route('carritos.create') }}" class="btn btn-primary">Nuevo Carrito</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Usuario ID</th>
                <th>Producto ID</th>
                <th>Cantidad</th>
                <th>Precio Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carritos as $carrito)
                <tr>
                    <td>{{ $carrito->id }}</td>
                    <td>{{ $carrito->id_usuario }}</td>
                    <td>{{ $carrito->id_producto }}</td>
                    <td>{{ $carrito->cantidad_productos }}</td>
                    <td>{{ $carrito->precio_total }}</td>
                    <td>
                        <a href="{{ route('carritos.edit', $carrito->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('carritos.destroy', $carrito->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
