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
        @yield('content')
    </div>

    <!-- Bootstrap JS (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


