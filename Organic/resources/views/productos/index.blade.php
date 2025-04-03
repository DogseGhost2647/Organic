@extends('layouts.app')
@section('content')
<h1 class="text-center p-3">Productos</h1>
    <div class="p-5 table-responsive">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Categoria</th>
      <th scope="col">Condición</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach ($productos as $producto)
    <td>{{ $producto ->id }}</td>
    <td>{{ $producto ->nombre }}</td>
    <td>{{ $producto ->precio }}</td>
    <td>{{ $producto ->cantidad_disponible }}</td>
    <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
    <td>{{ $producto->condicionCabello->nombre ?? 'Sin condición' }}</td>
    <td>{{ $producto ->estado }}</td>
    <td>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $producto->id }}">
  Editar
</button>

    @include('productos.update', ['producto' => $producto, 'categorias' => $categorias, 'condiciones' => $condiciones])
      <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este examen?')">
            Eliminar
        </button>
    </form>
    </td>
    </tr>
    @endforeach
  </tbody>
  </table>
    </div>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
@endsection