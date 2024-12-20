@extends('empleado.layout')

@section('content')
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <h2>Mascotas</h2>
        @if(isset($cliente))
            <a href="{{ route('empleado.clientes.mascotas.create', $cliente->id_cliente) }}" class="btn btn-primary mb-3">Registrar Mascota</a>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Meses</th>
                    <th>Años</th>
                    <th>Peso</th>
                    <th>Raza</th>
                    <th>Tipo</th>
                    <th>Género</th>
                    <th>Etapa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->meses }}</td>
                        <td>{{ $mascota->años }}</td>
                        <td>{{ $mascota->peso }}</td>
                        <td>{{ $mascota->raza->raza }}</td>
                        <td>{{ $mascota->tipoMascota->tipo }}</td>
                        <td>{{ $mascota->genero->genero }}</td>
                        <td>{{ $mascota->etapa->edad }}</td>
                        <td>
                            <a href="{{ route('empleado.clientes.mascotas.edit', ['cliente' => $mascota->cliente->id_cliente, 'mascota' => $mascota->id_mascota]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('empleado.clientes.mascotas.destroy', ['cliente' => $mascota->cliente->id_cliente, 'mascota' => $mascota->id_mascota]) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">{{ $message ?? 'No hay mascotas registradas.' }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
