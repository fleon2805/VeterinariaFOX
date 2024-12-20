@extends('empleado.layout')

@section('title', 'Inventario')

@section('content')
<div class="container mt-5">
    <h1>Inventario de Productos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Presentación</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Proveedor</th>
                <th>Etapa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->presentacion }}</td>
                    <td>{{ $producto->precio_unitario }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->marca->nombre }}</td>
                    <td>{{ $producto->categoria->tipo_mascota }}</td>
                    <td>{{ $producto->proveedor->nombre }}</td>
                    <td>{{ $producto->etapa->edad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
