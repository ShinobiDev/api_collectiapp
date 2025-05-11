<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    // Listar todos los tipos
    public function index()
    {
        $types = Type::all();
        return response()->json($types);
    }

    // Mostrar un tipo específico
    public function show($id)
    {
        $type = Type::findOrFail($id);
        return response()->json($type);
    }

    // Crear un nuevo tipo
    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'name' => 'required|string|unique:types',
        ]);

        $type = Type::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($type, 201); // Código 201: Creado
    }

    // Actualizar un tipo existente
    public function update(Request $request, $id)
    {
        $type = Type::findOrFail($id);

        // Validar la entrada
        $request->validate([
            'name' => 'required|string|unique:types,name,' . $type->id,
        ]);

        $type->update([
            'name' => $request->input('name'),
        ]);

        return response()->json($type);
    }

    // Eliminar un tipo
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return response()->json(['message' => 'Tipo eliminado'], 204);
    }
}
