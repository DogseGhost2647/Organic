@extends('layouts.app3')
@section('content')
<div class="container">
    <div class="card p-4">
        <h2 class="text-center">Iniciar sesion</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
            {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesion</button>
        </form>
    </div>
</div>
@endsection
