<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\DependencyInjection;

use Illuminate\Support\ServiceProvider;
use Presentation\Illuminate\Console\Commands\Make\ChannelMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ClassMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ComponentMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ConsoleMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ControllerMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\EnumMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\EventMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\InterfaceMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\JobMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\JobMiddlewareMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ListenerMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\MailMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\MiddlewareMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ModelMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ObserverMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\PolicyMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\RequestMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ResourceMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\RuleMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\ScopeMakeCommand;
use Presentation\Illuminate\Console\Commands\Make\TraitMakeCommand;

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
