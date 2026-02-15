<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class ModelMakeCommand extends \Illuminate\Foundation\Console\ModelMakeCommand
{
    use InfrastructureLayerGenerator;

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "$rootNamespace\Persistence\Models";
    }
}
