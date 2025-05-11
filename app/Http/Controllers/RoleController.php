<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Listar todos los roles
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // Mostrar un rol específico
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        // Validar entrada
        $request->validate([
            'name' => 'required|string|unique:roles',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($role, 201); // Código 201: Creado
    }

    // Actualizar un rol existente
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        // Validar entrada
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->input('name'),
        ]);

        return response()->json($role);
    }

    // Eliminar un rol
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Rol eliminado'], 204);
    }
}
