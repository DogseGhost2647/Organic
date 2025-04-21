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
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        .navbar {
            background-color: #6c9724 !important; /* Verde natural elegante */
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
        .container {
            margin-top: 4rem;
        }
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
        .btn-register {
            background-color: #6c9724;
            color: white;
            padding: 10px 24px;
            border-radius: 30px;
            font-size: 18px;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-register:hover {
            background-color: #597a1d;
        }
        .login-link {
            display: inline-block;
            margin-top: 12px;
            color: #6c9724;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }
        .login-link:hover {
            text-decoration: underline;
            color: #597a1d;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="/">O-RGANIC</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>