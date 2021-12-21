<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Request\Api\User\RegisterRequest;
use App\Repositories\Dto\User\AddUserDto;
use App\Repositories\UserRepository;

class RegisterController extends AuthController
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userRepository->add(
            new AddUserDto(...$request->validated())
        );

        $token = auth()->login($user);

        return $this->respondWithToken((string) $token);
    }
}
