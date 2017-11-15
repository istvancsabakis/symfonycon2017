<?php

namespace State;

class ClosedDoorState extends DoorState
{
    public function open(): DoorState
    {
        return new OpenDoorState();
    }

    public function lock(): DoorState
    {
        return new LockedDoorState();
    }
}
