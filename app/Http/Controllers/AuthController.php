<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', [
            'except' => [
                'login',
                'register'
            ]
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->remember_me  ? true : false;
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(
                [
                    'errors' => []
                ],
                401
            );
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user_id'   => auth()->user()->id,
            'name'      => auth()->user()->name,
            'email'     => auth()->user()->email,
        ]);
    }
}