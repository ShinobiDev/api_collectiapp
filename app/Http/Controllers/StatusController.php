<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Lista todos los statuses
    public function index()
    {
        $statuses = Status::all();
        return response()->json($statuses);
    }

    // Muestra un status específico
    public function show($id)
    {
        $status = Status::findOrFail($id);
        return response()->json($status);
    }

    // Crea un nuevo status
    public function store(Request $request)
    {
        //dd('Llegue aca');
        // Validación básica
        $request->validate([
            'name' => 'required|string|unique:statuses',
        ]);

        $status = Status::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($status, 201); // Código 201: Creado
    }

    // Actualiza un status existente
    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);

        // Validación
        $request->validate([
            'name' => 'required|string|unique:statuses,name,' . $status->id,
        ]);

        $status->update([
            'name' => $request->input('name'),
        ]);

        return response()->json($status);
    }

    // Elimina un status
    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return response()->json(['message' => 'Status eliminado'], 204);
    }
}
