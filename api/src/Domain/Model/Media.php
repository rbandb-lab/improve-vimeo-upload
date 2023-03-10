<?php

declare(strict_types=1);

namespace Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Domain\Model\ValueObject\File;

abstract class Media
{
    protected File  $file;
    protected int $createdAt;
    protected ?int $updatedAt = null;

    protected Collection $permissions;

    public function __construct(File $file)
    {
        $this->file = $file;
        $this->createdAt = time();
        $this->permissions = new ArrayCollection();
    }

    public function getFile(): File
    {
        return $this->file;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
