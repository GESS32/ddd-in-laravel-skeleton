<?php

declare(strict_types=1);

namespace Domain\Translate;

interface TranslatorInterface
{
    public function resolve(string $key, array $replace = [], ?string $locale = null): string|array;
}
