<?php

declare(strict_types=1);

namespace Domain\Model\ValueObject;

class File
{
    private string $fileName;
    private string $fileExtension;
    private string $contentType;
    private int $size;
    private ?string $binaryContent;

    public function __construct(
        string $fileName,
        string $fileExtension,
        string $contentType,
        int $size,
        ?string $binaryContent = null
    ) {
        $this->fileName = $fileName;
        $this->fileExtension = $fileExtension;
        $this->contentType = $contentType;
        $this->size = $size;
        $this->binaryContent = $binaryContent;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getFileExtension(): string
    {
        return $this->fileExtension;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getBinaryContent(): ?string
    {
        return $this->binaryContent;
    }
}
