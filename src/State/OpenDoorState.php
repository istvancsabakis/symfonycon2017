<?php

namespace State;

class OpenDoorState extends DoorState
{
    public function close(): DoorState
    {
        return new ClosedDoorState();
    }
}
