@extends('layouts.app3')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm border-0" style="border-radius: 15px; background-color: rgba(255, 255, 255, 0.9);">
                <h2 class="text-center fw-bold mb-4" style="color: #6c9724;">Iniciar sesión</h2>

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="correo" class="form-control form-control-lg rounded-pill" placeholder="Correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control form-control-lg rounded-pill" placeholder="Contraseña" required>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn-register">
                            Iniciar Sesión
                        </button>
                    </div>

                    <div class="text-center mt-4">
                    <p class="text-muted">¿No tienes cuenta?</p>
                    <a href="/registro" style="color: #6c9724; text-decoration: underline;">Registrarse</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
