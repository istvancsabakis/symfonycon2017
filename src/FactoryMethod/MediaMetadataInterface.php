<?php

namespace FactoryMethod;

interface MediaMetadataInterface
{
    public function getPath(): string;

    public function getSize(): int;
}
