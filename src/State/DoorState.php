<?php

namespace State;

abstract class DoorState
{
    public function open(): DoorState
    {
        throw new IllegalStateTransitionException;
    }

    public function close(): DoorState
    {
        throw new IllegalStateTransitionException;
    }

    public function lock(): DoorState
    {
        throw new IllegalStateTransitionException;
    }

    public function unlock(): DoorState
    {
        throw new IllegalStateTransitionException;
    }
}
