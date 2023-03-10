<?php

declare(strict_types=1);

namespace Domain\SharedKernel\Application\Query;

interface QueryBusInterface
{
    public function dispatch(QueryInterface $query);
}
