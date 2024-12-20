<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function inicioSesion()
    {
        return view('usuarios.login');
    }

    public function validarSesion(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required',
        ]);
    
        $usuario = Usuario::where('correo', $request->correo)->first();
    
        if ($usuario && Hash::check($request->contraseña, $usuario->contraseña)) {
            Auth::login($usuario);
            if ($usuario->id_tipo_usuario == 1) { // Cliente
                if ($usuario->cliente) {
                    return redirect()->route('usuarios.inicio_cliente')->with('success', 'Iniciaste sesión correctamente. ¡Bienvenido ' . $usuario->cliente->nombre . '!');
                } else {
                    return back()->withErrors([
                        'correo' => 'No se encontró el cliente asociado. Intenta nuevamente.',
                    ]);
                }
            } elseif ($usuario->id_tipo_usuario == 2) { // Empleado
                if ($usuario->empleado) {
                    return redirect()->route('usuarios.inicio_empleado')->with('success', 'Iniciaste sesión correctamente. ¡Bienvenido ' . $usuario->empleado->nombre . '!');
                } else {
                    return back()->withErrors([
                        'correo' => 'No se encontró el empleado asociado. Intenta nuevamente.',
                    ]);
                }
            }
        }
    
        return back()->withErrors([
            'correo' => 'Los datos ingresados son incorrectos. Intenta nuevamente.',
        ]);
    }

    public function registrar()
    {
        return view('usuarios.registro');
    }

    public function guardarRegistro(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dni' => 'required|string|max:255',
        'telefono' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'correo' => 'required|string|email|max:255|unique:usuarios,correo',
        'contraseña' => 'required|string|min:8|confirmed',
    ]);

    $cliente = Cliente::create([
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'dni' => $request->dni,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
    ]);

    Usuario::create([
        'usuario' => $request->correo,
        'contraseña' => Hash::make($request->contraseña),
        'correo' => $request->correo,
        'id_tipo_usuario' => 1, // Asegúrate de que este valor corresponde al tipo "Cliente"
        'id_cliente' => $cliente->id_cliente,
    ]);

    return redirect()->route('usuarios.inicio_sesion')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
}

    public function inicioCliente()
    {
        return view('cliente.index');
    }

    public function inicioEmpleado()
    {
        return view('empleado.index');
    }
}
