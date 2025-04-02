<nav class="navbar navbar-expand-lg navbar-dark bg-black p-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-white fs-4" href="#">
            @if(auth()->check() && auth()->user()->role == 'admin')
                Admin
            @elseif(auth()->check() && auth()->user()->role == 'profesor')
                Profesor
            @elseif(auth()->check() && auth()->user()->role == 'estudiante')
                Estudiante
            @else
                Usuario
            @endif
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-3">
                <li class="nav-item1">
                    <a class="nav-link text-light" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item1">
                    <a class="nav-link text-light" href="{{ route('bolsa_laboral') }}">Bolsa Laboral</a>
                </li>
            </ul>
        </div>
        <!-- Dropdown con el nombre del usuario -->
        @auth
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>
