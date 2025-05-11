<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    // Listar todos los géneros
    public function index()
    {
        $genders = Gender::all();
        return response()->json($genders);
    }

    // Mostrar un género específico
    public function show($id)
    {
        $gender = Gender::findOrFail($id);
        return response()->json($gender);
    }

    // Crear un nuevo género
    public function store(Request $request)
    {
        // Validar entrada
        $request->validate([
            'name' => 'required|string|unique:genders',
        ]);

        $gender = Gender::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($gender, 201); // Código 201: Creado
    }

    // Actualizar un género existente
    public function update(Request $request, $id)
    {
        $gender = Gender::findOrFail($id);

        // Validar entrada
        $request->validate([
            'name' => 'required|string|unique:genders,name,' . $gender->id,
        ]);

        $gender->update([
            'name' => $request->input('name'),
        ]);

        return response()->json($gender);
    }

    // Eliminar un género
    public function destroy($id)
    {
        $gender = Gender::findOrFail($id);
        $gender->delete();

        return response()->json(['message' => 'Género eliminado'], 204);
    }
}
