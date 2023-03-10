<?php

declare(strict_types=1);

namespace Domain\Model;

use Domain\Model\ValueObject\File;

class Picture extends Media
{
    private int $height;
    private int $width;
    private ?int $resolution = null;

    public function __construct(File $fileVo, int $height, int $width, ?int $resolution)
    {
        parent::__construct($fileVo);
        $this->height = $height;
        $this->width = $width;
        $this->resolution = $resolution;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getResolution(): ?int
    {
        return $this->resolution;
    }
}
