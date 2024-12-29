<?php

declare(strict_types=1);

namespace Architecture\Infrastructure\Adapters;

interface ConfigAdapterInterface
{
    public function get(string $key, mixed $default = null): mixed;
}
