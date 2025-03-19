<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Administrativo')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos adicionales -->
    <style>
        .navbar-brand {
            font-weight: bold;
            color: #dc3545 !important; /* Color rojo similar a Laravel */
        }
        .dropdown-menu {
            min-width: 200px;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black p-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-white fs-4" href="#">Admin</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link text-light" href=" {{ route('inicio') }} ">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href=" {{ route('bolsa_laboral') }}">Bolsa Laboral</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido de cada vista -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger text-white" role="alert">
                    <strong>ACTIVIDAD RECIENTE</strong>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="fw-bold">49</h2>
                            <p>Ofertas</p>
                        </div>
                        <i class="bi bi-file-earmark-text h1"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="fw-bold">78</h2>
                            <p>Empresas</p>
                        </div>
                        <i class="bi bi-briefcase h1"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="fw-bold">0</h2>
                            <p>Contratados</p>
                        </div>
                        <i class="bi bi-person-check h1"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="fw-bold">0</h2>
                            <p>Postulaciones</p>
                        </div>
                        <i class="bi bi-people h1"></i>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <!-- Bootstrap JS (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>