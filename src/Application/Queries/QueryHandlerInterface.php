<?php

declare(strict_types=1);

namespace Application\Queries;

/**
 * @template TQuery of QueryInterface
 * @template TResult
 */
interface QueryHandlerInterface
{
    /**
     * @param TQuery $query
     * @return TResult
     */
    public function handle(QueryInterface $query): mixed;
}
