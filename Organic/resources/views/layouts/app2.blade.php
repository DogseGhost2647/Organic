<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
    text-align: center;
    margin-top: 100px;
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
    </style>
    </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="/">Organic</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/registro">Registrarse</a>
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