<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -250px;
        }
        #sidebar-wrapper {
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            z-index: 1000;
            overflow-y: auto;
            background: #8B4513; /* Color marrón */
            transition: margin 0.25s ease-out;
        }
        #page-content-wrapper {
            width: 100%;
            position: absolute;
            padding: 15px;
        }
        #wrapper.toggled #page-content-wrapper {
            margin-left: 0;
        }
        .sidebar-heading {
            color: white;
        }
        .list-group-item {
            color: white;
        }
        .list-group-item-action.bg-light {
            background-color: #8B4513 !important;
        }
        .list-group-item-action.bg-light:hover {
            background-color: #6E3A0D !important;
        }
        .list-group-item-action.bg-light a {
            color: white !important;
        }
        .list-group-item-action.bg-light a:hover {
            color: #D3D3D3 !important;
        }
        #usuariosSubmenu .list-group-item-action {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin Panel</div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Productos</a>
                <a href="#usuariosSubmenu" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" aria-expanded="false" style="font-weight: bold; color: #2C2C2C;">Usuarios</a>
                <div class="collapse" id="usuariosSubmenu">
                    <a href="{{ route('admin.empleados.index') }}" class="list-group-item list-group-item-action bg-light">Empleados</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Clientes</a>
                </div>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="logout-link">Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('logout-link').addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('¿Estás seguro de cerrar sesión?')) {
                document.getElementById('logout-form').submit();
            }
        });
    </script>
</body>
</html>