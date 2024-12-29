<?php

declare(strict_types=1);

namespace Architecture\Infrastructure\Adapters;

class TranslatorAdapterLaravel implements TranslatorAdapterInterface
{
    public function resolve(string $key, array $replace = [], ?string $locale = null): string|array
    {
        return trans($key, $replace, $locale);
    }
}
