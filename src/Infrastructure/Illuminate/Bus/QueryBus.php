<?php

declare(strict_types=1);

namespace Infrastructure\Illuminate\Bus;

use Application\Queries\QueryBusInterface;
use Application\Queries\QueryHandlerInterface;
use Application\Queries\QueryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use RuntimeException;

final class QueryBus implements QueryBusInterface
{
    /**
     * @param  array<class-string<QueryInterface>, class-string<QueryHandlerInterface<QueryInterface, mixed>>>  $map
     */
    public function __construct(private readonly Container $container, private array $map) {}

    /**
     * @param  class-string<QueryInterface>  $queryClass
     * @param  class-string<QueryHandlerInterface<QueryInterface, mixed>>  $queryHandlerClass
     */
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
