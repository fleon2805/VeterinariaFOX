@extends('cliente.layout')

@section('title', 'Configuración de Cuenta')

@section('content')
<div class="container mt-5">
    <h2>Configuración de Cuenta</h2>
    <form method="POST" action="{{ route('cliente.configuracion.update') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" readonly>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $cliente->apellidos }}" readonly>
        </div>
        <div class="form-group">
            <label for="dni">DNI:</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ $cliente->dni }}" readonly>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion }}">
        </div>
        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{ $usuario->correo }}" readonly>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="cambiarContrasena" name="cambiarContrasena">
            <label class="form-check-label" for="cambiarContrasena">¿Cambiar contraseña?</label>
        </div>
        <div id="cambiarContrasenaSection" style="display: none;">
            <div class="form-group">
                <label for="contrasena_actual">Ingresa contraseña actual:</label>
                <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual">
            </div>
            <div class="form-group">
                <label for="nueva_contrasena">Ingresa Nueva Contraseña:</label>
                <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena">
            </div>
            <div class="form-group">
                <label for="nueva_contrasena_confirmation">Confirmar Nueva Contraseña:</label>
                <input type="password" class="form-control" id="nueva_contrasena_confirmation" name="nueva_contrasena_confirmation">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('usuarios.inicio_cliente') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.getElementById('cambiarContrasena').addEventListener('change', function () {
        var section = document.getElementById('cambiarContrasenaSection');
        section.style.display = this.checked ? 'block' : 'none';
    });
</script>
@endsection