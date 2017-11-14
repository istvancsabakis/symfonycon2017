<?php

namespace FactoryMethod;

use Assert\Assertion;

abstract class MediaMetadata implements MediaMetadataInterface
{
    private $path;
    private $size;

    public function __construct(string $path, int $size)
    {
        Assertion::notEmpty($path);
        Assertion::greaterOrEqualThan($size, 0);

        $this->path = $path;
        $this->size = $size;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
