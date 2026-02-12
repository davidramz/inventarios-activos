<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Area;
use App\Models\Puesto;
use App\Models\Campus;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('area', 'puesto', 'campus')->get();
        return view('empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        $puestos = Puesto::all();
        $campuses = Campus::all();
        return view('empleado.create', compact('areas', 'puestos', 'campuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|string|max:50|unique:empleados,numero',
            'nombre' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'puesto_id' => 'required|exists:puestos,id',
            'campus_id' => 'required|exists:campus,id',
        ]);

        Empleado::create($validated);

        return redirect()->route('empleado.index')
                        ->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        $empleado->load('area', 'puesto', 'campus');
        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        $areas = Area::all();
        $puestos = Puesto::all();
        $campuses = Campus::all();
        return view('empleado.edit', compact('empleado', 'areas', 'puestos', 'campuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $validated = $request->validate([
            'numero' => 'required|string|max:50|unique:empleados,numero,' . $empleado->id,
            'nombre' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'puesto_id' => 'required|exists:puestos,id',
            'campus_id' => 'required|exists:campus,id',
        ]);

        $empleado->update($validated);

        return redirect()->route('empleado.index')
                        ->with('success', 'Empleado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleado.index')
                        ->with('success', 'Empleado eliminado exitosamente.');
    }
}
