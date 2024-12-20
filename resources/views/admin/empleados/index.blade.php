@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h1>Lista de Empleados</h1>
    <a href="{{ route('admin.empleados.create') }}" class="btn btn-primary mb-3">Añadir Empleado</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha de Ingreso</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id_empleado }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellidos }}</td>
                <td>{{ $empleado->dni }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->fecha_ingreso }}</td>
                <td>{{ $empleado->salario }}</td>
                <td>
                    <a href="{{ route('admin.empleados.show', $empleado->id_empleado) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('admin.empleados.edit', $empleado->id_empleado) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.empleados.destroy', $empleado->id_empleado) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection