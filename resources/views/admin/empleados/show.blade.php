@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h1>Detalles del Empleado</h1>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <td>{{ $empleado->nombre }}</td>
        </tr>
        <tr>
            <th>Apellidos:</th>
            <td>{{ $empleado->apellidos }}</td>
        </tr>
        <tr>
            <th>DNI:</th>
            <td>{{ $empleado->dni }}</td>
        </tr>
        <tr>
            <th>Dirección:</th>
            <td>{{ $empleado->direccion }}</td>
        </tr>
        <tr>
            <th>Teléfono:</th>
            <td>{{ $empleado->telefono }}</td>
        </tr>
        <tr>
            <th>Fecha de Ingreso:</th>
            <td>{{ $empleado->fecha_ingreso }}</td>
        </tr>
        <tr>
            <th>Salario:</th>
            <td>{{ $empleado->salario }}</td>
        </tr>
    </table>
</div>
@endsection