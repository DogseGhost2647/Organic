<div class="modal fade" id="modal{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('productos.update', $producto->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $producto->descripcion }}">
          </div>
          <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{ $producto->precio }}" required>
          </div>
          <div class="form-group">
            <label for="cantidad_disponible">Cantidad Disponible:</label>
            <input type="number" id="cantidad_disponible" name="cantidad_disponible" class="form-control" value="{{ $producto->cantidad_disponible }}" required>
          </div>
          <div class="form-group">
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" id="id_categoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->id_categoria ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_condicion">Condición de Cabello:</label>
            <select name="id_condicion" id="id_condicion" required>
                @foreach($condiciones as $condicion)
                    <option value="{{ $condicion->id }}" {{ $condicion->id == $producto->id_condicion ? 'selected' : '' }}>{{ $condicion->nombre }}</option>
                @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary mt-3">Actualizar producto</button>
        </form>
      </div>
    </div>
  </div>
</div>