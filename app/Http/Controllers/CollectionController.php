<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class CollectionController extends Controller
{
    // Listar todas las colecciones
    public function index()
    {
        $collections = Collection::all();
        return response()->json($collections);
    }

    // Método para obtener los datos en array sin devolver respuesta
    protected function getCollectionData($id)
    {
        $collection = Collection::with('type','editorial','genders','author')->where('id',$id)->first();
        $nombresArray = $collection->genders->pluck('name')->toArray();
        $collectionData = [
            'id' => $collection->id,
            'name' => $collection->name,
            'type' => $collection->type->name ?? null,
            'editorial' => $collection->editorial->name ?? null,
            'author' => $collection->author->name ?? null,
            'volumes' => $collection->number_of_volumes,
            'genders' => $nombresArray
        ];
        
        return $collectionData;
    }

    // Mostrar una colección específica
    public function show($id)
    {        
        $result = $this->getCollectionData($id);
        return response()->json($result);
    }

    // Crear una nueva colección
    public function store(Request $request)
    {
        try {
            // Validación
            try {
                $request->validate([
                'name' => 'required|string|unique:collections',
                'category' => 'required|integer|exists:categories,id',
                'author' => 'required|integer|exists:authors,id',
                'type' => [
                    'required',
                    'integer',
                    Rule::exists('types', 'id')->where(function ($query) {
                        $query->where('parent_type_id', 6);
                    }),
                ],
                'editorial' => 'required|integer|exists:editorials,id',
                'gender_ids' => 'required|array',
                'gender_ids.*' => 'integer|exists:genders,id'
            ]);
            } catch (ValidationException $e) {
                return response()->json([
                    'errors' => $e->errors(),
                ], 422);
            }

            $collection = Collection::create([
                'name' => $request->input('name'),
                'gender_id' => $request->input('gender'),
                'category_id' => $request->input('category'),
                'author_id' => $request->input('author'),
                'type_id' => $request->input('type'),
                'editorial_id' => $request->input('editorial'),
                'number_of_volumes' => $request->input('number_volumes')
            ]);

            // Sincronizar géneros
            $collection->genders()->sync($request['gender_ids']);
            // Cargar relaciones y devolver respuesta
            $collection->load('genders');
            // Obtener los datos de la nueva colección
            $result = $this->getCollectionData($collection->id);

            return response()->json($result, 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
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
