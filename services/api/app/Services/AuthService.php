<?php

namespace App\Services;

use Domain\Shared\User;
use Illuminate\Http\Request;
use Domain\Auth\Dto\LoginDto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;

class AuthService
{
    public function __construct(
        protected Request $request
    ) {}

    /**
     * @param \Domain\Auth\Dto\LoginDto $dto
     * @return string
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function login(LoginDto $dto): string
    {
        /** @var \Domain\Shared\User $user */
        $user = User::query()->where(['email' => $dto->email])->first();

        if (! $user || ! Hash::check($dto->password, $user->password)) {
            throw new AuthenticationException();
        }

        return $user->createToken($dto->email)->plainTextToken;
    }
}
