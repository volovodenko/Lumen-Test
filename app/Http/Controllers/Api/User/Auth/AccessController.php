<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Request\Api\User\SignInRequest;

class AccessController extends AuthController
{
    public function signIn(SignInRequest $request)
    {
        $token = auth()->attempt($request->validated());

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken((string) $token);
    }
}
