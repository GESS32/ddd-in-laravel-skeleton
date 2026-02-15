<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class EventMakeCommand extends \Illuminate\Foundation\Console\EventMakeCommand
{
    use InfrastructureLayerGenerator;
}
