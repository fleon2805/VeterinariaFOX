<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleado.index', compact('empleados')); // Asegúrate de que esta vista exista
    }

    public function create()
    {
        return view('empleado.create'); // Asegúrate de que esta vista exista
    }

    public function store(Request $request)
    {
        $empleado = new Empleado($request->all());
        $empleado->save();
        return redirect()->route('empleado.index');
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.show', compact('empleado')); // Asegúrate de que esta vista exista
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado')); // Asegúrate de que esta vista exista
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleado.index');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleado.index');
    }
}
