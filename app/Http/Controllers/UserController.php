<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para usar bcrypt

class UserController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Mostrar un usuario por ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        // Validar datos (si quieres agregar validación)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required|integer',
            'status_id' => 'required|integer'
        ]);

        // Crear usuario con contraseña cifrada
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // bcrypt
            'role_id' => $request->input('role_id'),
            'status_id' => $request->input('status_id'),
        ]);

        return response()->json($user, 201);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validar datos
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:6',
            'role_id' => 'sometimes|required|integer',
            'status_id' => 'sometimes|required|integer'
        ]);

        // Actualizar campos
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        if ($request->has('role_id')) {
            $user->role_id = $request->input('role_id');
        }
        if ($request->has('status_id')) {
            $user->status_id = $request->input('status_id');
        }

        $user->save();

        return response()->json($user);
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
