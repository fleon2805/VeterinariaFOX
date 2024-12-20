<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class RegistroController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required|max:255',
            'correo' => 'required|email|unique:usuarios',
            'contraseña' => 'required|min:8',
        ]);

        $usuario = Usuario::create([
            'usuario' => $validated['usuario'],
            'correo' => $validated['correo'],
            'contraseña' => $validated['contraseña'],
            'id_tipo_usuario' => 1, // Suponiendo que 1 es el ID para clientes
        ]);

        return redirect()->route('login');
    }
}
