<?php

namespace Tests\FactoryMethod;

use FactoryMethod\PlainTextMetadata;
use FactoryMethod\PlainTextMetadataFactory;
use PHPUnit\Framework\TestCase;
use Psr\SimpleCache\CacheInterface;

class PlainTextMetadataFactoryTest extends TestCase
{
    public function testLoadMetadata(): void
    {
        $factory = new PlainTextMetadataFactory($this->createMock(CacheInterface::class));
        $metadata = $factory->loadMetadata(__DIR__.'/../Fixtures/foo.txt');

        $this->assertInstanceOf(PlainTextMetadata::class, $metadata);

        if ($metadata instanceof PlainTextMetadata) {
            $this->assertSame(4, $metadata->getLinesCount());
        }
    }
}
