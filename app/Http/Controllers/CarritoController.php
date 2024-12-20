<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\CarritoProducto;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $cliente = Auth::user()->cliente;

        if (!$cliente) {
            return redirect()->route('cliente.carrito')->withErrors(['error' => 'Cliente no encontrado.']);
        }

        $carrito = Carrito::where('id_cliente', $cliente->id_cliente)->with('productos.producto')->first();
        if (!$carrito) {
            $carrito = new Carrito(['id_cliente' => $cliente->id_cliente]);
            $carrito->save();
        }

        $subtotal = $carrito->productos->sum(function ($item) {
            return $item->cantidad * $item->producto->precio_unitario;
        });

        $igv = $subtotal * 0.18;
        $total = $subtotal + $igv;

        return view('cliente.carrito', compact('carrito', 'subtotal', 'igv', 'total'));
    }

    public function add(Request $request, Producto $producto)
    {
        $cliente = Auth::user()->cliente;

        if (!$cliente) {
            return redirect()->route('cliente.tienda')->withErrors(['error' => 'Cliente no encontrado.']);
        }

        $carrito = Carrito::firstOrCreate(['id_cliente' => $cliente->id_cliente]);

        $carritoProducto = $carrito->productos()->where('id_producto', $producto->id_producto)->first();

        if ($carritoProducto) {
            $carritoProducto->cantidad++;
            $carritoProducto->save();
        } else {
            $carrito->productos()->create([
                'id_producto' => $producto->id_producto,
                'cantidad' => 1,
            ]);
        }

        return redirect()->route('cliente.tienda')->with('success', 'Producto añadido al carrito');
    }

    public function increment(Request $request, Producto $producto)
    {
        $cliente = Auth::user()->cliente;
        if (!$cliente) {
            return redirect()->route('cliente.carrito')->withErrors(['error' => 'Cliente no encontrado.']);
        }

        $carrito = $cliente->carrito;
        if (!$carrito) {
            return redirect()->route('cliente.carrito')->withErrors(['error' => 'Carrito no encontrado.']);
        }

        $carritoProducto = CarritoProducto::where('id_carrito', $carrito->id_carrito)
            ->where('id_producto', $producto->id_producto)
            ->first();

        if ($carritoProducto) {
            $carritoProducto->cantidad++;
            $carritoProducto->save();
        }

        return redirect()->route('cliente.carrito')->with('success', 'Cantidad incrementada');
    }

    public function decrement(Request $request, Producto $producto)
    {
        $cliente = Auth::user()->cliente;
        if (!$cliente) {
            return redirect()->route('cliente.carrito')->withErrors(['error' => 'Cliente no encontrado.']);
        }

        $carrito = $cliente->carrito;
        if (!$carrito) {
            return redirect()->route('cliente.carrito')->withErrors(['error' => 'Carrito no encontrado.']);
        }

        $carritoProducto = CarritoProducto::where('id_carrito', $carrito->id_carrito)
            ->where('id_producto', $producto->id_producto)
            ->first();

        if ($carritoProducto && $carritoProducto->cantidad > 1) {
            $carritoProducto->cantidad--;
            $carritoProducto->save();
        } elseif ($carritoProducto && $carritoProducto->cantidad == 1) {
            $carritoProducto->delete();
        }

        return redirect()->route('cliente.carrito')->with('success', 'Cantidad decrementada');
    }

    public function remove(Request $request, Producto $producto)
    {
        $cliente = Auth::user()->cliente;
        if (!$cliente) {
            return redirect()->route('cliente.carrito')->withErrors(['error' => 'Cliente no encontrado.']);
        }

        $carrito = $cliente->carrito;
        if (!$carrito) {
            return redirect()->route('cliente.carrito')->withErrors(['error' => 'Carrito no encontrado.']);
        }

        $carritoProducto = CarritoProducto::where('id_carrito', $carrito->id_carrito)
            ->where('id_producto', $producto->id_producto)
            ->first();

        if ($carritoProducto) {
            $carritoProducto->delete();
        }

        return redirect()->route('cliente.carrito')->with('success', 'Producto eliminado del carrito');
    }
}
