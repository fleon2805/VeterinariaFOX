@extends('empleado.layout')

@section('title', 'Mascotas')

@section('content')
<div class="container mt-5">
    <h1>Mascotas</h1>
    @if(isset($message))
        <div class="alert alert-info">{{ $message }}</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Meses</th>
                    <th>Años</th>
                    <th>Peso</th>
                    <th>Género</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->meses }}</td>
                        <td>{{ $mascota->años }}</td>
                        <td>{{ $mascota->peso }}</td>
                        <td>{{ $mascota->genero->genero }}</td>
                        <td>{{ $mascota->tipoMascota->tipo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection