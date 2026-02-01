<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\Adapters;

use Domain\Config\ConfigInterface;

class ConfigAdapterLaravel implements ConfigInterface
{
    public function get(string $key, mixed $default = null): mixed
    {
        return config($key, $default);
    }
}
