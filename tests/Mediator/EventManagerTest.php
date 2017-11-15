<?php

namespace Tests\Mediator;

use Mediator\Event;
use Mediator\EventManager;
use PHPUnit\Framework\TestCase;

class EventManagerTest extends TestCase
{
    public function testNotifyListeners(): void
    {
        $callback1 = 'no';
        $callback2 = 'no';
        $callback3 = 'no';

        $manager = new EventManager();
        $manager->listen('foo', function () use (&$callback1) {
            $callback1 = 'yes';
        });
        $manager->listen('foo', function (Event $event) use (&$callback2) {
            $callback2 = 'yes';
            $event->stop();
        });
        $manager->listen('bar', function () use (&$callback3) {
            $callback3 = 'yes';
        });
        $manager->listen('foo', function () {
            $this->fail('Callback is not supposed to be notified!');
        });

        $manager->fire('foo', $event = new Event());

        $this->assertTrue($event->isStopped());
        $this->assertSame('yes', $callback1);
        $this->assertSame('yes', $callback2);
        $this->assertSame('no', $callback3);

        $manager->fire('bar', $event = new Event());

        $this->assertFalse($event->isStopped());
        $this->assertSame('yes', $callback3);
    }
}
