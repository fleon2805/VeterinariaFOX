@extends('layout')

@section('title', 'Inicio de Sesión')

@section('content')
<div class="container">
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ route('usuarios.validar_sesion') }}">
        @csrf
        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>
@endsection
