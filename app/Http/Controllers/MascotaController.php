<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Raza;
use App\Models\TipoMascota;
use App\Models\Genero;
use App\Models\Etapa;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::with(['cliente', 'raza', 'tipoMascota', 'genero', 'etapa'])->get();
        return view('empleado.mascotas.index', compact('mascotas'));
    }

    public function clienteMascotas(Cliente $cliente)
    {
        $mascotas = $cliente->mascotas()->with(['raza', 'tipoMascota', 'genero', 'etapa'])->get();
        return view('empleado.mascotas.index', [
            'mascotas' => $mascotas,
            'message' => $mascotas->isEmpty() ? 'Este cliente aún no tiene mascotas registradas.' : null,
            'cliente' => $cliente,
        ]);
    }

    public function create(Cliente $cliente)
    {
        $razas = Raza::all();
        $tipos = TipoMascota::all();
        $generos = Genero::all();
        $etapas = Etapa::all();

        return view('empleado.mascotas.create', compact('cliente', 'razas', 'tipos', 'generos', 'etapas'));
    }

    public function store(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'meses' => 'required|integer',
            'años' => 'required|integer',
            'peso' => 'required|numeric',
            'id_raza' => 'required|exists:razas,id_raza',
            'id_tipo_mascota' => 'required|exists:tipo_mascotas,id_tipo_mascota', // Asegúrate de que este es el nombre correcto
            'id_genero' => 'required|exists:generos,id_genero',
            'id_etapa' => 'required|exists:etapas,id_etapa',
        ]);

        $cliente->mascotas()->create($request->all());

        return redirect()->route('empleado.clientes.mascotas', $cliente->id_cliente)
                         ->with('success', 'Mascota creada con éxito.');
    }

    public function edit(Cliente $cliente, Mascota $mascota)
    {
        $razas = Raza::all();
        $tipos = TipoMascota::all();
        $generos = Genero::all();
        $etapas = Etapa::all();

        return view('empleado.mascotas.edit', compact('cliente', 'mascota', 'razas', 'tipos', 'generos', 'etapas'));
    }

    public function update(Request $request, Cliente $cliente, Mascota $mascota)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'meses' => 'required|integer',
            'años' => 'required|integer',
            'peso' => 'required|numeric',
            'id_raza' => 'required|exists:razas,id_raza',
            'id_tipo_mascota' => 'required|exists:tipo_mascotas,id_tipo_mascota', // Asegúrate de que este es el nombre correcto
            'id_genero' => 'required|exists:generos,id_genero',
            'id_etapa' => 'required|exists:etapas,id_etapa',
        ]);

        $mascota->update($request->all());

        return redirect()->route('empleado.clientes.mascotas', $cliente->id_cliente)
                         ->with('success', 'Mascota actualizada con éxito.');
    }

    public function destroy(Cliente $cliente, Mascota $mascota)
    {
        $mascota->delete();

        return redirect()->route('empleado.clientes.mascotas', $cliente->id_cliente)
                         ->with('success', 'Mascota eliminada con éxito.');
    }

    public function show(Cliente $cliente, Mascota $mascota)
    {
        return view('empleado.mascotas.show', compact('cliente', 'mascota'));
    }
}
