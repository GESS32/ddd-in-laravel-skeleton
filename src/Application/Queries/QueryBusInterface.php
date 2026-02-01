<?php

declare(strict_types=1);

namespace Application\Queries;

use RuntimeException;

interface QueryBusInterface
{
    /**
     * @param class-string<QueryInterface> $queryClass
     * @param class-string<QueryHandlerInterface> $queryHandlerClass
     */
    public function map(string $queryClass, string $queryHandlerClass): void;

    /**
     * @throws RuntimeException
     */
    public function ask(QueryInterface $query): mixed;
}
