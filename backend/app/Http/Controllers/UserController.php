<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::whereNull('deleted_at')
            ->select(
                'id', 'nombre', 'apellido', 'correo_electronico',
                'cedula', 'pasaporte', 'telefono', 'direccion', 'pais'
            )
            ->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No hay usuarios registrados.']);
        }

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::whereNull('deleted_at')->find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user);
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        if (empty($validated['cedula']) && empty($validated['pasaporte'])) {
            return response()->json([
                'message' => 'Debe ingresar una cédula (si es colombiano) o un pasaporte (si es extranjero).'
            ], 422);
        }

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'user' => $user
        ], 201);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::whereNull('deleted_at')->find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $data = $request->validated();
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->delete(); 

        return response()->json([
            'message' => 'Usuario eliminado correctamente (soft delete)'
        ]);
    }
}
