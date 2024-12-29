<?php

declare(strict_types=1);

namespace Architecture\Infrastructure\Adapters;

class ConfigAdapterLaravel implements ConfigAdapterInterface
{
    public function get(string $key, mixed $default = null): mixed
    {
        return config($key, $default);
    }
}
