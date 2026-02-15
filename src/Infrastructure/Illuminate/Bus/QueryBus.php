<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\Bus;

use Application\{Queries\QueryBusInterface, Queries\QueryInterface};
use Illuminate\Contracts\Container\{BindingResolutionException, Container};
use RuntimeException;

final class QueryBus implements QueryBusInterface
{
    public function __construct(private readonly Container $container, private array $map) {}

    public function map(string $queryClass, string $queryHandlerClass): void
    {
        $this->map[$queryClass] = $queryHandlerClass;
    }

    public function ask(QueryInterface $query): mixed
    {
        $handlerClass = $this->map[$query::class] ?? null;

        if ($handlerClass === null) {
            $queryClass = $query::class;
            throw new RuntimeException("No mapped handler for given \"$queryClass\" class.");
        }

        try {
            $handler = $this->container->make($handlerClass);
        } catch (BindingResolutionException $exception) {
            throw new RuntimeException(
                message: "Failed to resolve query handler: $handlerClass",
                previous: $exception
            );
        }

        return $handler($query);
    }
}
