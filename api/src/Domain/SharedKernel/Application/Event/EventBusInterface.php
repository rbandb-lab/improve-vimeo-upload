<?php

declare(strict_types=1);

namespace Domain\SharedKernel\Application\Event;

interface EventBusInterface
{
    public function dispatch(EventInterface $command);
}
