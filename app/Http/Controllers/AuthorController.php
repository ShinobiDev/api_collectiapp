<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Mostrar todos los autores
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    // Mostrar un autor específico
    public function show($id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    // Crear un nuevo autor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    // Actualizar un autor existente
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
        ]);

        $author->update($request->all());

        return response()->json($author);
    }

    // Eliminar un autor
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(['message' => 'Autor eliminado']);
    }
}
