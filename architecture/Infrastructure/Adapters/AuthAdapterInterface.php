<?php

declare(strict_types=1);

namespace Architecture\Infrastructure\Adapters;

interface AuthAdapterInterface
{
    public function login(array $credentials, bool $remember = false): bool;

    public function validate(array $credentials): bool;

    public function loginOnce(array $credentials): bool;

    public function logout(): void;

    public function isUser(): bool;

    public function isGuest(): bool;

    public function getUser(): ?array;
}
