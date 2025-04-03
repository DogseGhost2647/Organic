@extends('layouts.app')

@section('content')
    <h1>Agregar Producto al Carrito</h1>
    <form action="{{ route('carrito.store') }}" method="POST">
        @csrf
        <input type="number" name="id_usuario" placeholder="ID Usuario" required>
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <button type="submit">Agregar</button>
    </form>
@endsection
