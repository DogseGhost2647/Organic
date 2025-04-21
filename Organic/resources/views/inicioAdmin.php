@extends('layouts.app7')

@section('content')
<div class="container">
    <div class="container center">
    <h1 class="fw-bold">Bienvenido a <span style="color: #333;">Or-ganic, Administrador</span></h1>
    <p class="fs-5">
        Aqui puede administrar el inventario de la tienda
    </p>
    </div>
    
    <a href="/registro" class="btn-register">Registrarse</a>
    <a href="/login" class="login-link">Iniciar Sesión</a>
</div>
@endsection