<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\User\Auth;

abstract class AuthController
{
    protected function respondWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
        ]);
    }
}
