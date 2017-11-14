<?php

namespace FactoryMethod;

interface MediaMetadataFactoryInterface
{
    public function loadMetadata(string $file): MediaMetadataInterface;
}
