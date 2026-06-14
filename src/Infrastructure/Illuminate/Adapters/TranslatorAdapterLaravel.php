<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\Adapters;

use Domain\Translate\TranslatorInterface;

class TranslatorAdapterLaravel implements TranslatorInterface
{
    /**
     * @param  array<string, mixed>  $replace
     * @return array<string, mixed>|string
     */
    public function resolve(string $key, array $replace = [], ?string $locale = null): string|array
    {
        return trans($key, $replace, $locale);
    }
}
