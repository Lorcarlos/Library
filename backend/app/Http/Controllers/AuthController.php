<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validación
        $request->validate([
            'correo_electronico' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('correo_electronico', $request->correo_electronico)
                    ->whereNull('deleted_at')
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = base64_encode("{$user->id}:".now());

        return response()->json([
            'message' => 'Login exitoso',
            'user' => $user,
            'token' => $token
        ]);
    }
}
