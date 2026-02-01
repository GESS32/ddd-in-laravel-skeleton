<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\Bus;

use Application\{Commands\CommandBusInterface, Commands\CommandInterface};
use Illuminate\Bus\Dispatcher;

final readonly class CommandBus implements CommandBusInterface
{
    public function __construct(private Dispatcher $dispatcher, array $map)
    {
        $this->dispatcher->map($map);
    }

    public function map(string $commandClass, string $commandHandlerClass): void
    {
        $this->dispatcher->map([$commandClass => $commandHandlerClass]);
    }

    public function dispatch(CommandInterface $command): void
    {
        $this->dispatcher->dispatch($command);
    }
}
