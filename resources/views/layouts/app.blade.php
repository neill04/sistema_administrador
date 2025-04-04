<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'bolsa_laboral')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Barra de navegación -->
    @auth
        @include('layouts.navbar')
    @endauth

    <!-- Contenido de cada vista -->
    @auth
        <div container="mt-4">
            @yield('content_bolsa_laboral')
        </div>
        <br><br>
        @yield('content_inicio')

        @yield('content_mi_cv')
        @yield('content_cvs')
    @endauth
    
    @guest
        @yield('content_login')
    @endguest

    <!-- Bootstrap JS (Popper + Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @auth
        <footer class="bg-dark text-center text-white py-3 mt-auto">
            PPD - INTRANET
        </footer>
    @endauth
</body>
</html>


