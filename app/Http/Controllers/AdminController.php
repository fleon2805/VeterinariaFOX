<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'contraseña');

        if (Auth::guard('admin')->attempt(['correo' => $credentials['correo'], 'password' => $credentials['contraseña'], 'id_tipo_usuario' => 1])) {
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors(['correo' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login')->with('status', '¡Usted ha cerrado sesión con éxito!');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    // Métodos CRUD para Empleados
    public function indexEmpleados()
    {
        $empleados = Empleado::all();
        return view('admin.empleados.index', compact('empleados'));
    }

    public function createEmpleado()
    {
        return view('admin.empleados.create');
    }

    public function storeEmpleado(Request $request)
    {
        $empleado = new Empleado($request->all());
        $empleado->save();
        return redirect()->route('admin.empleados.index');
    }

    public function showEmpleado($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('admin.empleados.show', compact('empleado'));
    }

    public function editEmpleado($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('admin.empleados.edit', compact('empleado'));
    }

    public function updateEmpleado(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->fill($request->all());
        $empleado->save();
        return redirect()->route('admin.empleados.index');
    }

    public function destroyEmpleado($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('admin.empleados.index');
    }
}