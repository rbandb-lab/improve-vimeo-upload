<?php

declare(strict_types=1);

namespace Domain\Model;

use Domain\Model\ValueObject\File;

class Video extends Media
{
    private ?int $duration = null;

    public function __construct(File $file, ?int $duration = null)
    {
        parent::__construct($file);
        $this->duration = $duration;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }
}
