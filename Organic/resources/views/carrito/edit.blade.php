@extends('layouts.app')

@section('content')
    <h1>Editar Producto en Carrito</h1>
    <form action="{{ route('carrito.update', $carrito->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="number" name="cantidad" value="{{ $carrito->cantidad }}" required>
        <input type="text" name="precio_total" value="{{ $carrito->precio_total }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection
