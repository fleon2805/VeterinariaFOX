@extends('empleado.layout')

@section('content')
    <div class="container mt-5">
        <h2>Registrar Mascota</h2>
        <form method="POST" action="{{ route('empleado.clientes.mascotas.store', $cliente->id_cliente) }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="meses">Meses:</label>
                <input type="number" id="meses" name="meses" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="años">Años:</label>
                <input type="number" id="años" name="años" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <input type="number" id="peso" name="peso" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_raza">Raza:</label>
                <select id="id_raza" name="id_raza" class="form-control" required>
                    <option value="" selected disabled>Seleccionar Raza</option>
                    @foreach($razas as $raza)
                        <option value="{{ $raza->id_raza }}">{{ $raza->raza }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tipo_mascota">Tipo:</label>
                <select id="id_tipo_mascota" name="id_tipo_mascota" class="form-control" required>
                    <option value="" selected disabled>Seleccionar Tipo</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id_tipo_mascota }}">{{ $tipo->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_genero">Género:</label>
                <select id="id_genero" name="id_genero" class="form-control" required>
                    <option value="" selected disabled>Seleccionar Género</option>
                    @foreach($generos as $genero)
                        <option value="{{ $genero->id_genero }}">{{ $genero->genero }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_etapa">Etapa:</label>
                <select id="id_etapa" name="id_etapa" class="form-control" required>
                    <option value="" selected disabled>Seleccionar Etapa</option>
                    @foreach($etapas as $etapa)
                        <option value="{{ $etapa->id_etapa }}">{{ $etapa->edad }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
