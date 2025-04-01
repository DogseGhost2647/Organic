@extends('layouts.app')
@section('content')
<div class="card" style="width: 58rem;">
  <div class="card-body">
    <h5 class="card-title">Agregar producto</h5>
    <form method="POST" action="{{ route('productos.store') }}">
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
            <label for="condicion_cabello">Condición de Cabello:</label>
            <select name="condicion_cabello" id="condicion_cabello" required>
                @foreach($condiciones as $condicion)
                    <option value="{{ $condicion->id }}">{{ $condicion->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form_group">
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="disponible">disponible</opt>
                <option value="agotado">agotado</option>
                <option value="descontinuado">descontinuado</option>
            </select>
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