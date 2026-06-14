<?php

declare(strict_types=1);

namespace Domain\Translate;

interface TranslatorInterface
{
    /**
     * @param  array<string, mixed>  $replace
     * @return array<string, mixed>|string
     */
    public function resolve(string $key, array $replace = [], ?string $locale = null): string|array;
}
