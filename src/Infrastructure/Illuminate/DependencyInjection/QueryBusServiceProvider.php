<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\DependencyInjection;

use Application\Queries\QueryBusInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Illuminate\Bus\QueryBus;

final class QueryBusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            abstract: QueryBusInterface::class,
            concrete: fn() => $this->app->make(QueryBus::class, [
                'map' => [
                    // ...
                ],
            ])
        );
    }
}
