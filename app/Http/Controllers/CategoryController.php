<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Listar todas las categorías
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Mostrar una categoría específica
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|string|unique:categories',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($category, 201); // Código 201: Creado
    }

    // Actualizar una categoría existente
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validación
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);

        return response()->json($category);
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Categoría eliminada'], 204);
    }
}
