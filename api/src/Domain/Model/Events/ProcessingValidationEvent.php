<?php

declare(strict_types=1);

namespace Domain\Model\Events;

class ProcessingValidationEvent implements FileProcessingEventInterface
{
    private bool $status;
    private bool $fileAccessible;
    private ?string $publicPath;

    public function __construct(bool $status, bool $fileAccessible)
    {
        $this->status = $status;
        $this->fileAccessible = $fileAccessible;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function isFileAccessible(): bool
    {
        return $this->fileAccessible;
    }

    public function getPublicPath(): ?string
    {
        return $this->publicPath;
    }

    public function setPublicPath(?string $publicPath): void
    {
        $this->publicPath = $publicPath;
    }
}
