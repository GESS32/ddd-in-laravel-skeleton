<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class ScopeMakeCommand extends \Illuminate\Foundation\Console\ScopeMakeCommand
{
    use InfrastructureLayerGenerator;

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "$rootNamespace\Persistence\Scopes";
    }
}
