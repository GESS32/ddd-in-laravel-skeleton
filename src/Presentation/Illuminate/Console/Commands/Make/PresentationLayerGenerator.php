<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

use Illuminate\Support\Str;

trait PresentationLayerGenerator
{
    protected function rootNamespace(): string
    {
        return 'Presentation\Illuminate';
    }

    public function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $name = str_replace('\\', '/', $name);
        $name = trim($name, '/');

        return "src/Presentation/Illuminate/$name.php";
    }
}
