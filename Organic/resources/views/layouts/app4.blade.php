<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar estilos */
        .navbar {
            background-color: #6c9724 !important;
            padding: 15px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }
        .navbar .nav-link,
        .navbar .btn-link {
            color: white !important;
            font-weight: 500;
            transition: color 0.3s, transform 0.3s;
        }
        .navbar .nav-link:hover,
        .navbar .btn-link:hover {
            color: #e8f5c8 !important;
            transform: scale(1.05);
        }

        .cart-icon {
            position: relative;
            display: inline-block;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: #ff4d4f;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            font-weight: bold;
        }

        .container {
            text-align: center;
            margin-top: 5rem;
        }

        /* Cards */
        .card {
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
            padding: 25px;
            border-radius: 15px;
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Botones */
        .btn-primary {
            background-color: #4c4cff;
            border: none;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #3a3adc;
        }

        .btn-register {
            background-color: #9b59b6;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 18px;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-register:hover {
            background-color: #8e44ad;
        }

        /* Link de login */
        .login-link {
            display: block;
            margin-top: 10px;
            color: #9b59b6;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }
        .login-link:hover {
            text-decoration: underline;
            color: #8e44ad;
        }
        .card img {
    width: 100%;
    height: 200px; /* Ajusta este valor según el tamaño de tu tarjeta */
    object-fit: cover; /* Mantiene la proporción */
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-white" href="/home">O-RGANIC</a>

        <div class="d-flex align-items-center">
        @auth
            @if (Auth::user() && Auth::user()->isAdmin())
                <a class="nav-link text-white me-3 position-relative" href="{{ route('productos.index') }}">Gestionar Productos</a>
            @endif

        @endauth

            <a class="nav-link text-white me-3 position-relative" href="/carrito/index">
                <i class="bi bi-cart-fill fs-5"></i> Carrito
            @php
                $cartCount = \App\Models\Carrito::where('id_usuario', Auth::id())->sum('cantidad_productos');
            @endphp

            <span class="cart-badge">{{ $cartCount }}</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-white text-decoration-none p-0 m-0 fw-bold">Cerrar sesión</button>
            </form>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
