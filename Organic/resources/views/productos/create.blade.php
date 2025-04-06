    @extends('layouts.app6')
    @section('content')

    <div class="card" style="width: 50rem;">
    <div class="card-body">
        <h5 class="card-title">Agregar producto</h5>
        <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control">
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad_disponible">Cantidad Disponible:</label>
                <input type="number" id="cantidad_disponible" name="cantidad_disponible" class="form-control"required>
            </div>
            <div class="form-group">
                <label for="id_categoria">Categoría:</label>
                <select name="id_categoria" id="id_categoria" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_condicion">Condición de Cabello:</label>
                <select name="id_condicion" id="id_condicion" required>
                    @foreach($condiciones as $condicion)
                        <option value="{{ $condicion->id }}">{{ $condicion->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tipo">Tipo de cabello:</label>
                <select name="id_tipo" id="id_tipo" required>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del producto:</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <button type="submit" class="form-control">Guardar Producto</button>
        </form>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
    </div>
    </div>
    @endsection