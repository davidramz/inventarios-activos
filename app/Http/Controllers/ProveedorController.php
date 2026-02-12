<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:proveedores,codigo',
            'nombre' => 'required|string|max:255',
            'rfc' => 'nullable|string|max:13|unique:proveedores,rfc',
            'calle' => 'nullable|string|max:255',
            'colonia' => 'nullable|string|max:100',
            'cp' => 'nullable|string|max:10',
            'ciudad' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:50',
            'telefono' => 'nullable|string|max:20',
            'giro' => 'nullable|string|max:100',
        ]);

        Proveedor::create($validated);

        return redirect()->route('proveedor.index')
                        ->with('success', 'Proveedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedor.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:proveedores,codigo,' . $proveedor->id,
            'nombre' => 'required|string|max:255',
            'rfc' => 'nullable|string|max:13|unique:proveedores,rfc,' . $proveedor->id,
            'calle' => 'nullable|string|max:255',
            'colonia' => 'nullable|string|max:100',
            'cp' => 'nullable|string|max:10',
            'ciudad' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:50',
            'telefono' => 'nullable|string|max:20',
            'giro' => 'nullable|string|max:100',
        ]);

        $proveedor->update($validated);

        return redirect()->route('proveedor.index')
                        ->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedor.index')
                        ->with('success', 'Proveedor eliminado exitosamente.');
    }
}
