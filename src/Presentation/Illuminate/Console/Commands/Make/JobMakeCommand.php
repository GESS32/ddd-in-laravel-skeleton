<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class JobMakeCommand extends \Illuminate\Foundation\Console\JobMakeCommand
{
    use InfrastructureLayerGenerator;
}
