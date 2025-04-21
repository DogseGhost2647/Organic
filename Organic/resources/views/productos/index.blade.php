@extends('layouts.app')

@section('content')

    <!-- Cabecera -->
    <section class="text-center py-3" style="background-color: #6c9724; color: white; border-radius: 10px;">
        <h1 class="fw-bold mb-3">Productos</h1>
        <p class="lead">Gestiona, edita y elimina los productos disponibles.</p>
    </section>

    <!-- Contenido -->
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success shadow-sm rounded-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive shadow-lg p-3 mb-5 bg-white rounded" style="border-radius: 15px;">
            <table class="table table-hover table-striped">
                <thead class="bg-success text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Condición</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->cantidad_disponible }}</td>
                            <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                            <td>{{ $producto->condicionCabello->nombre ?? 'Sin condición' }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>
                                <!-- Botón Editar -->
                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal{{ $producto->id }}">
                                    Editar
                                </button>

                                <!-- Modal de edición -->
                                @include('productos.update', ['producto' => $producto, 'categorias' => $categorias, 'condiciones' => $condiciones])

                                <!-- Formulario Eliminar -->
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection