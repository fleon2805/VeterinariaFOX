<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Simula el inicio de sesión sin autenticación
        return redirect()->route('inicio');
    }

    public function logout(Request $request)
    {
        // Simula el cierre de sesión sin autenticación
        return redirect()->route('inicio');
    }
}
