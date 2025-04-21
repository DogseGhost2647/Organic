@extends('layouts.app3')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm border-0" style="border-radius: 15px;">
                <h2 class="text-center fw-bold mb-4" style="color: #6c9724;">Crear una cuenta</h2>

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('registro') }}">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="nombre" class="form-control form-control-lg rounded-pill" placeholder="Nombre completo" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="correo" class="form-control form-control-lg rounded-pill" placeholder="Correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="telefono" class="form-control form-control-lg rounded-pill" placeholder="Teléfono" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="direccion" class="form-control form-control-lg rounded-pill" placeholder="Dirección" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control form-control-lg rounded-pill" placeholder="Contraseña" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control form-control-lg rounded-pill" placeholder="Confirmar contraseña" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn" style="background-color: #6c9724; color: white; padding: 10px; font-size: 18px; border-radius: 30px;">
                            Registrarme
                        </button>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>

                <div class="text-center mt-4">
                    <p class="text-muted">¿Ya tienes una cuenta?</p>
                    <a href="/login" style="color: #6c9724; text-decoration: underline;">Iniciar sesión</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection