<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\DependencyInjection;

use Illuminate\Support\ServiceProvider;

use Presentation\Illuminate\Console\Commands\Make\{ChannelMakeCommand,
    ClassMakeCommand,
    ComponentMakeCommand,
    ConsoleMakeCommand,
    ControllerMakeCommand,
    EnumMakeCommand,
    EventMakeCommand,
    InterfaceMakeCommand,
    JobMakeCommand,
    JobMiddlewareMakeCommand,
    ListenerMakeCommand,
    MailMakeCommand,
    MiddlewareMakeCommand,
    ModelMakeCommand,
    ObserverMakeCommand,
    PolicyMakeCommand,
    RequestMakeCommand,
    ResourceMakeCommand,
    RuleMakeCommand,
    ScopeMakeCommand,
    TraitMakeCommand};

final class GeneratorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChannelMakeCommand::class,
                ClassMakeCommand::class,
                ComponentMakeCommand::class,
                ConsoleMakeCommand::class,
                ControllerMakeCommand::class,
                EnumMakeCommand::class,
                EventMakeCommand::class,
                InterfaceMakeCommand::class,
                JobMakeCommand::class,
                JobMiddlewareMakeCommand::class,
                ListenerMakeCommand::class,
                MailMakeCommand::class,
                MiddlewareMakeCommand::class,
                ModelMakeCommand::class,
                ObserverMakeCommand::class,
                PolicyMakeCommand::class,
                RequestMakeCommand::class,
                ResourceMakeCommand::class,
                RuleMakeCommand::class,
                ScopeMakeCommand::class,
                TraitMakeCommand::class,
            ]);
        }
    }
}
