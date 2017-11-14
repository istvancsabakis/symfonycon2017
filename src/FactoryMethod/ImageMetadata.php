<?php

namespace FactoryMethod;

use Assert\Assertion;

class ImageMetadata extends MediaMetadata
{
    private const PORTRAIT = 'portrait';
    private const LANDSCAPE = 'landscape';
    private const SQUARE = 'square';

    private $width;
    private $height;

    public function __construct(string $path, int $size, int $width, int $height)
    {
        Assertion::greaterOrEqualThan($width, 1);
        Assertion::greaterOrEqualThan($height, 1);

        parent::__construct($path, $size);

        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getOrientation(): string
    {
        if ($this->height === $this->width) {
            return self::SQUARE;
        }

        return $this->height > $this->width ? self::PORTRAIT : self::LANDSCAPE;
    }
}
