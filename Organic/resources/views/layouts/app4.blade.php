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
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
        }

        /* Navbar estilos */
        .navbar {
            background-color: #6c9724 !important;
            padding: 0.8rem 1rem;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.7rem;
            letter-spacing: 1px;
            color: #ffffff !important;
        }
        .navbar .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            transition: color 0.3s;
        }
        .navbar .nav-link:hover {
            color: #d4edda !important;
            text-decoration: underline;
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
            margin-top: 4rem;
        }

        /* Cards */
        .card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        /* Botones */
        .btn-success {
            background-color: #6c9724;
            border: none;
            padding: 10px 24px;
            border-radius: 30px;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .btn-success:hover {
            background-color: #597a1d;
        }

        .btn-outline-success {
            color: #6c9724;
            border-color: #6c9724;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-outline-success:hover {
            background-color: #6c9724;
            color: white;
        }

        .join-section {
            background-color: #6c9724; 
            color: #f8f9fa;
            border-radius: 15px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="/home">O-RGANIC</a>
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