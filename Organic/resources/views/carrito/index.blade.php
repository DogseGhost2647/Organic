@extends('layouts.app')

@section('content')
    <h1>Carrito de Compras</h1>
    <a href="{{ route('carrito.create') }}">Agregar Producto</a>

    @foreach ($carrito as $item)
        <p>{{ $item->producto->nombre }} - {{ $item->cantidad }} unidades - ${{ $item->precio_total }}</p>
        <a href="{{ route('carrito.edit', $item->id) }}">Editar</a>
        <form action="{{ route('carrito.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    @endforeach
@endsection
