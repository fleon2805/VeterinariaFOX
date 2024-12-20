@extends('cliente.layout')

@section('title', 'Tienda')

@section('content')
<div class="container mt-5">
    <h1>Tienda</h1>
    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-fluid mb-3" alt="{{ $producto->nombre }}">
                        @else
                            <p>Imagen no disponible</p>
                        @endif
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">Marca: {{ $producto->marca->nombre }}</p>
                        <p class="card-text">Precio: S/. {{ number_format($producto->precio_unitario, 2) }}</p>
                        <p class="card-text">Stock: {{ $producto->stock > 0 ? 'Disponible' : 'No Disponible' }}</p>
                        <form action="{{ route('cliente.carrito.add', $producto) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
