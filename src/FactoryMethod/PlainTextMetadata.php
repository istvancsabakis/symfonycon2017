<?php

namespace FactoryMethod;

use Assert\Assertion;

class PlainTextMetadata extends MediaMetadata
{
    private $linesCount;

    public function __construct(string $path, int $size, int $linesCount)
    {
        Assertion::greaterOrEqualThan($linesCount, 0);

        parent::__construct($path, $size);

        $this->linesCount = $linesCount;
    }

    public function getLinesCount(): int
    {
        return $this->linesCount;
    }
}
