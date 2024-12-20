@extends('empleado.layout')

@section('content')
    <div class="container mt-5">
        <h2>Detalles de la Mascota</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $mascota->id_mascota }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $mascota->nombre }}</td>
            </tr>
            <tr>
                <th>Meses</th>
                <td>{{ $mascota->meses }}</td>
            </tr>
            <tr>
                <th>Años</th>
                <td>{{ $mascota->años }}</td>
            </tr>
            <tr>
                <th>Peso</th>
                <td>{{ $mascota->peso }}</td>
            </tr>
            <tr>
                <th>Raza</th>
                <td>{{ $mascota->raza->raza }}</td>
            </tr>
            <tr>
                <th>Tipo</th>
                <td>{{ $mascota->tipo->tipo }}</td>
            </tr>
            <tr>
                <th>Género</th>
                <td>{{ $mascota->genero->genero }}</td>
            </tr>
            <tr>
                <th>Etapa</th>
                <td>{{ $mascota->etapa->edad }}</td>
            </tr>
        </table>
        <a href="{{ route('empleado.clientes.mascotas.index', $cliente->id_cliente) }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
