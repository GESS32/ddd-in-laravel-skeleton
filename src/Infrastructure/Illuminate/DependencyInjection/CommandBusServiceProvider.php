<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\DependencyInjection;

use Application\Commands\CommandBusInterface;
use Illuminate\Support\ServiceProvider;

final class CommandBusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            abstract: CommandBusInterface::class,
            concrete: fn() => $this->app->make(CommandBusInterface::class, [
                'map' => [
                    // ...
                ],
            ])
        );
    }
}
