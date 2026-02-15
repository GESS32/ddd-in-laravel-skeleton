<?php

declare(strict_types=1);

namespace Application\Commands;

interface CommandBusInterface
{
    /**
     * @param class-string<CommandInterface> $commandClass
     * @param class-string<CommandHandlerInterface> $commandHandlerClass
     */
    public function map(string $commandClass, string $commandHandlerClass): void;

    public function dispatch(CommandInterface $command): void;
}
