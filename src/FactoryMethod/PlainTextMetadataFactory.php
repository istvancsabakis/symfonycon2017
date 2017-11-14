<?php

namespace FactoryMethod;

class PlainTextMetadataFactory extends MediaMetadataFactory
{
    protected function readMetadata(\SplFileInfo $file): MediaMetadataInterface
    {
        return new PlainTextMetadata(
            $file->getRealPath(),
            $file->getSize(),
            count(explode("\n", file_get_contents($file->getRealPath())))
        );
    }
}
