<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

use Illuminate\Support\Str;

trait InfrastructureLayerGenerator
{
    protected function rootNamespace(): string
    {
        return 'Infrastructure\Illuminate';
    }

    public function getPath($name): string
    {
        $path = Str::replaceFirst($this->rootNamespace(), '', $name);
        $path = str_replace('\\', '/', $path);
        $path = trim($path, '/');

        return "src/Infrastructure/Illuminate/$path.php";
    }
}
