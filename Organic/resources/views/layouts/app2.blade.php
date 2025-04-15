<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #6c9724 !important;
            padding: 10px;
        }
        .navbar .nav-link {
            color: white !important;
        }
        .navbar .nav-link:hover {
            text-decoration: underline;
        }
        .container {
            text-align: center;
            margin-top: 4rem; /* Ajustado para que no esté pegado al navbar */
        }
        .card {
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .btn-primary {
            background-color: #4c4cff;
            border: none;
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
        }
        .btn-register:hover {
            background-color: #8e44ad;
        }
        .login-link {
            display: block;
            margin-top: 10px;
            color: #9b59b6;
            text-decoration: none;
            font-size: 16px;
        }
        .login-link:hover {
            text-decoration: underline;
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
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand text-white" href="/">O-RGANIC</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/registro">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
