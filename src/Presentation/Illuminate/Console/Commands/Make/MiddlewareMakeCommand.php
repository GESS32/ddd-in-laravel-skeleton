<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class MiddlewareMakeCommand extends \Illuminate\Routing\Console\MiddlewareMakeCommand
{
    use PresentationLayerGenerator;
}
