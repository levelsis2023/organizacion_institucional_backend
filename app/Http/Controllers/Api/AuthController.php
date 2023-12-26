<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [], [
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
        ]);

        if ($credentials->fails()) {
            return response()->json(['error' => $credentials->errors()], 400);
        }

        $credentials = request(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'No Autorizado'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(JWTAuth::user());
    }

    public function logout()
    {
        JWTAuth::logout();

        return response()->json(['message' => 'Sesión Cerrada']);
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
    
        if (!$token) {
            return response()->json(['error' => 'Token no encontrado'], 401);
        }
    
        try {
            $newToken = JWTAuth::refresh($token);
            return $this->respondWithToken($newToken);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Error al intentar refrescar el token'], 401);
        }
    }
    

    protected function respondWithToken($token)
    {
        $user = User::with(['permissions'])->find(JWTAuth::user()->id);
        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }
}
