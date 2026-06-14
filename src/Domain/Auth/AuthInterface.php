<?php

declare(strict_types=1);

namespace Domain\Auth;

interface AuthInterface
{
    /**
     * @param  array<string, mixed>  $credentials
     */
    public function login(array $credentials, bool $remember = false): bool;

    /**
     * @param  array<string, mixed>  $credentials
     */
    public function validate(array $credentials): bool;

    /**
     * @param  array<string, mixed>  $credentials
     */
    public function loginOnce(array $credentials): bool;

    public function logout(): void;

    public function isUser(): bool;

    public function isGuest(): bool;

    /**
     * @return array<string, mixed>|null
     */
    public function getUser(): ?array;
}
