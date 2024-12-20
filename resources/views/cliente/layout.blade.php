<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/zorro.png') }}">
    <title>@yield('title') - Cliente - Clínica Veterinaria FOX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Clínica Veterinaria FOX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.inicio_cliente') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cliente.mascotas') }}">Mis Mascotas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cliente.tienda') }}">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cliente.carrito') }}">Mi Carrito</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    @php
                        $cliente = Auth::user()->cliente;
                        $nombreCompleto = $cliente->nombre . ' ' . substr($cliente->apellidos, 0, 1) . '.';
                    @endphp
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $nombreCompleto }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('cliente.configuracion') }}">Configuración de cuenta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('usuarios.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>
    <form id="logout-form" action="{{ route('usuarios.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
