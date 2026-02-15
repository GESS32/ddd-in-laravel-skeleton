<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class ControllerMakeCommand extends \Illuminate\Routing\Console\ControllerMakeCommand
{
    use PresentationLayerGenerator;
}
