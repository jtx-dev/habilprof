<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Log para debugging
        \Log::info('Login attempt', ['rut' => $request->rut, 'password' => $request->password]);

        // Validación simple
        if (!$request->rut || !$request->password) {
            return response()->json(['message' => 'RUT y contraseña son requeridos'], 400);
        }

        // Buscar usuario
        $user = User::where('rut_profesor_dnf', $request->rut)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        // Verificar contraseña (RUT sin último dígito)
        $rutSinDigito = (int) substr((string)$request->rut, 0, -1);
        
        if ($request->password != $rutSinDigito) {
            return response()->json(['message' => 'Contraseña incorrecta'], 401);
        }

        // Crear token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => [
                'rut' => $user->rut_profesor_dnf,
                'name' => $user->nombre_profesor_dnf,
            ],
            'token' => $token,
            'message' => 'Login exitoso'
        ]);
    }
}