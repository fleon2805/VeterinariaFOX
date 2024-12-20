<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('usuario')->get();
        return view('empleado.clientes', compact('clientes'));
    }

    public function mascotas()
    {
        $cliente = Auth::user()->cliente;

        if (!$cliente) {
            return redirect()->route('cliente.mascotas')->withErrors(['error' => 'Cliente no encontrado.']);
        }

        $mascotas = $cliente->mascotas;

        return view('cliente.mascotas', [
            'mascotas' => $mascotas,
            'message' => $mascotas->isEmpty() ? 'Usted no tiene mascotas registradas.' : null,
        ]);
    }

    public function configuracionCuenta()
    {
        $cliente = Auth::user()->cliente;
        $usuario = Auth::user();

        return view('cliente.configuracion', compact('cliente', 'usuario'));
    }

    public function actualizarCuenta(Request $request)
    {
        $request->validate([
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'contrasena_actual' => 'required_with:cambiarContrasena|nullable|string|min:8',
            'nueva_contrasena' => 'nullable|string|min:8|confirmed',
        ]);

        $cliente = Auth::user()->cliente;
        $usuario = Auth::user();

        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->save();

        if ($request->filled('cambiarContrasena')) {
            if (!Hash::check($request->input('contrasena_actual'), $usuario->contraseña)) {
                return back()->withErrors(['contrasena_actual' => 'La contraseña actual no es correcta.']);
            }

            $usuario->contraseña = Hash::make($request->input('nueva_contrasena'));
            $usuario->save();
        }

        return redirect()->route('cliente.configuracion')->with('success', 'Cuenta actualizada correctamente.');
    }

    public function show($id)
    {
        $cliente = Cliente::with('mascotas')->findOrFail($id);
        return view('empleado.cliente_show', compact('cliente'));
    }
}