<?php

namespace Tests\FactoryMethod;

use FactoryMethod\ImageMetadata;
use FactoryMethod\ImageMetadataFactory;
use PHPUnit\Framework\TestCase;
use Psr\SimpleCache\CacheInterface;

class ImageMetadataFactoryTest extends TestCase
{
    public function testLoadMetadata(): void
    {
        $factory = new ImageMetadataFactory($this->createMock(CacheInterface::class));
        $metadata = $factory->loadMetadata(__DIR__.'/../Fixtures/landscape.png');

        $this->assertInstanceOf(ImageMetadata::class, $metadata);
        $this->assertSame(24980, $metadata->getSize());

        if ($metadata instanceof ImageMetadata) {
            $this->assertSame(600, $metadata->getWidth());
            $this->assertSame(232, $metadata->getHeight());
            $this->assertSame('landscape', $metadata->getOrientation());
        }
    }
}
