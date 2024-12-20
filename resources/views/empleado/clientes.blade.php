@extends('empleado.layout')

@section('title', 'Clientes')

@section('content')
<div class="container mt-5">
    <h1>Clientes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <!-- Accediendo al correo a través de la relación usuario -->
                    <td>{{ $cliente->usuario->correo }}</td>
                    <td>
                        <a href="{{ route('empleado.clientes.mascotas', $cliente->id_cliente) }}" class="btn btn-primary">Ver Mascotas</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
