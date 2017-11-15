<?php

namespace Tests\State;

use PHPUnit\Framework\TestCase;
use State\Door;
use State\LockedDoorState;
use State\OpenDoorState;

class DoorTest extends TestCase
{
    public function testValidDoorLifecycle(): void
    {
        $door = new Door(new OpenDoorState());
        $door->close();
        $door->lock();
        $door->unlock();
        $door->open();
    }

    /**
     * @expectedException \State\IllegalStateTransitionException
     */
    public function testInvalidDoorLifecycle(): void
    {
        $door = new Door(new LockedDoorState());
        $door->open();
    }
}
