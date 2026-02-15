<?php

declare(strict_types=1);

namespace Presentation\Illuminate\Console\Commands\Make;

final class RequestMakeCommand extends \Illuminate\Foundation\Console\RequestMakeCommand
{
    use PresentationLayerGenerator;
}
