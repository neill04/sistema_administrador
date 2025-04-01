<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Administrativo')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
<body class="d-flex flex-column min-vh-100">
    <!-- Barra de navegación -->
    @include('layouts.navbar')

    <!-- Contenido de cada vista -->
    <div class="container mt-4">
        @yield('content_bolsa_laboral')
    </div>

    @yield('content_inicio')

    <!-- Bootstrap JS (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="bg-dark text-center text-white py-3 mt-auto">
        PPD - INTRANET
    </footer>

</body>
</html>


