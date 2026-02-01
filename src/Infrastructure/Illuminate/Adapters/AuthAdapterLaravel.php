<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\Adapters;

use Domain\Auth\AuthInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuthAdapterLaravel implements AuthInterface
{
    public function login(array $credentials, bool $remember = false): bool
    {
        return Auth::attempt($credentials, $remember);
    }

    public function validate(array $credentials): bool
    {
        return Auth::validate($credentials);
    }

    public function loginOnce(array $credentials): bool
    {
        return Auth::once($credentials);
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function isUser(): bool
    {
        return Auth::check();
    }

    public function isGuest(): bool
    {
        return Auth::guest();
    }

    public function getUser(): ?array
    {
        $user = Auth::user();

        return match (true) {
            $user instanceof Model => $user->toArray(),

            $user instanceof Authenticatable => [
                $user->getAuthIdentifierName() => $user->getAuthIdentifier(),
                $user->getAuthPasswordName() => $user->getAuthPassword(),
                $user->getRememberTokenName() => $user->getRememberToken(),
            ],

            default => null,
        };
    }
}
