<?php

namespace State;

class LockedDoorState extends DoorState
{
    public function unlock(): DoorState
    {
        return new ClosedDoorState();
    }
}
