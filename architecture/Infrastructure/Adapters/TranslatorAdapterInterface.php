<?php

declare(strict_types=1);

namespace Architecture\Infrastructure\Adapters;

interface TranslatorAdapterInterface
{
    public function resolve(string $key, array $replace = [], ?string $locale = null): string|array;
}
