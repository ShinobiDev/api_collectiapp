<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    // Mostrar todas las editoriales
    public function index()
    {
        $editorials = Editorial::all();
        return response()->json($editorials);
    }

    // Mostrar una editorial específica
    public function show($id)
    {
        $editorial = Editorial::findOrFail($id);
        return response()->json($editorial);
    }

    // Crear una nueva editorial
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $editorial = Editorial::create($request->all());

        return response()->json($editorial, 201);
    }

    // Actualizar una editorial existente
    public function update(Request $request, $id)
    {
        $editorial = Editorial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $editorial->update($request->all());

        return response()->json($editorial);
    }

    // Eliminar una editorial
    public function destroy($id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->delete();

        return response()->json(['message' => 'Editorial eliminada']);
    }
}
