
@extends('layouts.app3')
@section('content')
<div class="container">
    <div class="card p-4">
        <h2 class="text-center">Registro</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('registro') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="mb-3">
                <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
            </div>
            <div class="mb-3">
                <input type="text" name="direccion" class="form-control" placeholder="Dirección" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        </form>
    </div>
</div>
@endsection

