<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\DependencyInjection;

use Illuminate\Support\ServiceProvider;

final class ResourceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->instance(
            'path.resources',
            base_path('src/Presentation/Illuminate/resources')
        );
    }
}
