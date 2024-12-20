@extends('cliente.layout')

@section('title', 'Mi Carrito')
<script src="https://checkout.culqi.com/js/v4"></script>
@section('content')
<div class="container mt-5">
    <h1 class="text-center">MI CARRITO DE COMPRAS</h1>
    <div class="card mt-4">
        <div class="card-body">
            @if ($carrito->productos->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Importe</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrito->productos as $item)
                            <tr>
                                <td>{{ $item->producto->nombre }}</td>
                                <td>
                                    <form action="{{ route('cliente.carrito.decrement', $item->producto->id_producto) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-secondary">-</button>
                                    </form>
                                    <span>{{ $item->cantidad }}</span>
                                    <form action="{{ route('cliente.carrito.increment', $item->producto->id_producto) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-secondary">+</button>
                                    </form>
                                </td>
                                <td>S/. {{ number_format($item->producto->precio_unitario, 2) }}</td>
                                <td>S/. {{ number_format($item->cantidad * $item->producto->precio_unitario, 2) }}</td>
                                <td>
                                    <form action="{{ route('cliente.carrito.remove', $item->producto->id_producto) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Subtotal:</strong> S/. {{ number_format($subtotal, 2) }}
                    </div>
                    <div>
                        <strong>IGV (18%):</strong> S/. {{ number_format($igv, 2) }}
                    </div>
                    <div>
                        <strong>Total:</strong> S/. {{ number_format($total, 2) }}
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button id="btn_pagar" class="btn btn-success">Realiza Pago</button>
                </div>
            @else
                <p class="text-center">Tu carrito está vacío.</p>
            @endif
        </div>
    </div>
</div>
<script>
    Culqi.publicKey = 'pk_test_07e2b9f728f921sd';

    const btn_pagar = document.getElementById('btn_pagar');

    btn_pagar.addEventListener('click', function (e) {
      // Abre el formulario con la configuración en Culqi.settings y CulqiOptions
        Culqi.settings({
        title: 'Ricocan',
        currency: 'PEN',  // Este parámetro es requerido para realizar pagos yape
        amount: 1000,  // Este parámetro es requerido para realizar pagos yape
        order: 'ord_live_0CjjdWhFpEAZlxlz', // Este parámetro es requerido para realizar pagos con pagoEfectivo, billeteras y Cuotéalo
        xculqirsaid: 'Inserta aquí el id de tu llave pública RSA',
        rsapublickey: 'Inserta aquí tu llave pública RSA',
        });

        Culqi.options({
        lang: "auto",
        installments: false, // Habilitar o deshabilitar el campo de cuotas
        paymentMethods: {
          tarjeta: true,
          yape: true,
          bancaMovil: true,
          agente: true,
          billetera: true,
          cuotealo: true,
        },
         style: {
          logo: "https://static.culqi.com/v2/v2/static/img/logo.png",
        }
         });

      Culqi.open();
      e.preventDefault();
  })

  function culqi() {
    if (Culqi.token) {  // ¡Objeto Token creado exitosamente!
      const token = Culqi.token.id;
      const email = Culqi.token.email;
      console.log('Se ha creado un Token: ', token);
      //En esta linea de codigo debemos enviar el "Culqi.token.id"
      //hacia tu servidor con Ajax
      /*$.ajax({
        url:"procesarPago.php",
        type:"POST",
        data:{
            token:token,
            email:email
        }
      }).done(function(resp)){
        alert(resp);
      }*/



    
    } else if (Culqi.order) {  // ¡Objeto Order creado exitosamente!
      const order = Culqi.order;
      console.log('Se ha creado el objeto Order: ', order);

    } else {
      // Mostramos JSON de objeto error en consola
      console.log('Error : ',Culqi.error);
    }
  };

  </script>
@endsection