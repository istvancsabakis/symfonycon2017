<?php

namespace FactoryMethod;

class ImageMetadataFactory extends MediaMetadataFactory
{
    protected function readMetadata(\SplFileInfo $file): MediaMetadataInterface
    {
        if (!$sizes = @getimagesize($file->getRealPath())) {
            throw new \RuntimeException('Unable to read image size information.');
        }

        return new ImageMetadata(
            $file->getRealPath(),
            $file->getSize(),
            $sizes[0],
            $sizes[1]
        );
    }
}
