<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    // Listar todas las colecciones
    public function index()
    {
        $collections = Collection::all();
        return response()->json($collections);
    }

    // Mostrar una colección específica
    public function show($id)
    {
        $collection = Collection::findOrFail($id);
        return response()->json($collection);
    }

    // Crear una nueva colección
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|string|unique:collections',
            'visibility' => 'required|in:public,private',
            'category' => 'required|in:comic,libros,novelas,mangas',
            'type' => 'required|in:Especial,Regular',
            'publisher' => 'required|string',
        ]);

        $collection = Collection::create([
            'name' => $request->input('name'),
            'visibility' => $request->input('visibility'),
            'category' => $request->input('category'),
            'type' => $request->input('type'),
            'publisher' => $request->input('publisher'),
        ]);

        return response()->json($collection, 201);
    }

    // Actualizar una colección existente
    public function update(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);

        // Validación
        $request->validate([
            'name' => 'required|string|unique:collections,name,' . $collection->id,
            'visibility' => 'required|in:public,private',
            'category' => 'required|in:comic,libros,novelas,mangas',
            'type' => 'required|in:Especial,Regular',
            'publisher' => 'required|string',
        ]);

        $collection->update($request->only(['name', 'visibility', 'category', 'type', 'publisher']));

        return response()->json($collection);
    }

    // Eliminar una colección
    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);
        $collection->delete();

        return response()->json(['message' => 'Colección eliminada'], 204);
    }
}
