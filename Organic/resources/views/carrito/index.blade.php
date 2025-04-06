@extends('layouts.app5')

@section('content')
    <div class="card w-100" style="max-width: 800px;">
        <h1 class="text-center mb-4">Tu Carrito</h1>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        @if($carrito->isEmpty())
            <p class="text-center">No tienes productos en tu carrito.</p>
        @else
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrito as $item)
                        <tr>
                            <td>{{ $item->producto->nombre ?? 'Producto no disponible' }}</td>
                            <td>
                                @if ($item->producto)
                                    ${{ number_format($item->producto->precio, 2) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->cantidad_productos }}</td>
                            <td>${{ number_format($item->precio_total, 2) }}</td>
                            <td>
                                {{-- Botón eliminar individual --}}
                                <form action="{{ route('carrito.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto del carrito?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Total general --}}
            <div class="text-end fw-bold mb-3">
                Total: ${{ number_format($totalGeneral, 2) }}
            </div>

            {{-- Botón para vaciar el carrito --}}
            <div class="text-center mb-3">
                <form action="{{ route('carrito.vaciar') }}" method="POST" onsubmit="return confirm('¿Estás seguro de vaciar todo el carrito?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Vaciar carrito
                    </button>
                </form>
            </div>
        @endif

        {{-- Botón para añadir productos --}}
        <div class="text-center mt-3">
            <a href="{{ route('carrito.create') }}" class="btn btn-primary">
                Añadir productos
            </a>
        </div>
    </div>
@endsection
