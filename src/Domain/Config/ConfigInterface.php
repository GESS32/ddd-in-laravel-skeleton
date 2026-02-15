<?php

declare(strict_types=1);

namespace Domain\Config;

interface ConfigInterface
{
    public function get(string $key, mixed $default = null): mixed;
}
