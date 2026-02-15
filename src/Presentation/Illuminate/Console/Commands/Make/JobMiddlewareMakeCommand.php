<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class JobMiddlewareMakeCommand extends \Illuminate\Foundation\Console\JobMiddlewareMakeCommand
{
    use InfrastructureLayerGenerator;
}
