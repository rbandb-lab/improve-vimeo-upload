<?php

declare(strict_types=1);

namespace Domain\Model\Events;

class TransfertConfirmationEvent implements FileTransfertEventInterface
{
    private string $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
