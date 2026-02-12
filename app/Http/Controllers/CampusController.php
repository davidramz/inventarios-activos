<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campuses = Campus::all();

        return view('campus.index', compact('campuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:campus,nombre',
        ]);

        $campus = Campus::create($validated);

        // Si es una solicitud AJAX, devolver JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'campus' => $campus,
                'message' => 'Campus creado exitosamente.'
            ], 201);
        }

        return redirect()->route('campus.index')
            ->with('success', 'Campus creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campus $campus)
    {
        return view('campus.show', compact('campus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campus $campus)
    {
        return view('campus.edit', compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campus $campus)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255|unique:campus,nombre,'.$campus->id,
        ]);

        $campus->update($validated);

        return redirect()->route('campus.index')
            ->with('success', 'Campus actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campus $campus)
    {
        $campus->delete();

        return redirect()->route('campus.index')
            ->with('success', 'Campus eliminado exitosamente.');
    }
}
