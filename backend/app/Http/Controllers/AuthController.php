<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    /**
     * Iniciar sesión de un usuario.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        $user = User::where('email', $credentials['email'])->firstOrFail();

        // 1. Revocamos todos los tokens existentes del usuario
        $user->tokens()->delete();

        // 2. Creamos un nuevo token para el usuario
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        // 1. Obtenemos el usuario autenticado
        $user = $request->user();

        // 2. Revocamos todos los tokens del usuario
        $user->currentAccessToken()->delete();

        // 3. Retornamos un mensaje de éxito
        return response()->json([
            'message' => 'Cierre de sesión exitoso'
        ]);
    }
}
