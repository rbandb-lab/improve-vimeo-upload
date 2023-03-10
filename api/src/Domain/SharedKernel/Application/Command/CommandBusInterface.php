<?php

declare(strict_types=1);

namespace Domain\SharedKernel\Application\Command;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command);
}
