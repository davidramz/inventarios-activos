<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puestos = Puesto::all();
        return view('puesto.index', compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('puesto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:puestos,nombre',
        ]);

        $puesto = Puesto::create($validated);

        // Si es una solicitud AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'puesto' => $puesto,
                'message' => 'Puesto creado exitosamente.'
            ], 201);
        }

        return redirect()->route('puesto.index')
                        ->with('success', 'Puesto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puesto $puesto)
    {
        return view('puesto.show', compact('puesto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puesto $puesto)
    {
        return view('puesto.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puesto $puesto)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:puestos,nombre,' . $puesto->id,
        ]);

        $puesto->update($validated);

        return redirect()->route('puesto.index')
                        ->with('success', 'Puesto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puesto $puesto)
    {
        $puesto->delete();

        return redirect()->route('puesto.index')
                        ->with('success', 'Puesto eliminado exitosamente.');
    }
}
