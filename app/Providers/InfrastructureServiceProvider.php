<?php

declare(strict_types=1);

namespace App\Providers;

use Architecture\Infrastructure\Adapters\AuthAdapterInterface;
use Architecture\Infrastructure\Adapters\AuthAdapterLaravel;
use Architecture\Infrastructure\Adapters\ConfigAdapterInterface;
use Architecture\Infrastructure\Adapters\ConfigAdapterLaravel;
use Architecture\Infrastructure\Adapters\TranslatorAdapterInterface;
use Architecture\Infrastructure\Adapters\TranslatorAdapterLaravel;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class InfrastructureServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any infrastructure services.
     */
    public function register(): void
    {
        $this->app->bind(AuthAdapterInterface::class, AuthAdapterLaravel::class);
        $this->app->bind(ConfigAdapterInterface::class, ConfigAdapterLaravel::class);
        $this->app->bind(TranslatorAdapterInterface::class, TranslatorAdapterLaravel::class);
    }

    public function provides(): array
    {
        return [
            AuthAdapterInterface::class,
            ConfigAdapterInterface::class,
            TranslatorAdapterInterface::class,
        ];
    }
}
