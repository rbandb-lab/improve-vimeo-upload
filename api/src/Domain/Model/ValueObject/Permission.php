<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

/**
 * Typically WebClient, BackendClient and R, RW.
 */
class Permission
{
    private string $client;
    private string $access;

    public function __construct(string $client, string $access)
    {
        $this->client = $client;
        $this->access = $access;
    }

    public function getClient(): string
    {
        return $this->client;
    }

    public function getAccess(): string
    {
        return $this->access;
    }
}
