<?php

namespace State;

class Door
{
    private $state;

    public function __construct(DoorState $initialState)
    {
        $this->state = $initialState;
    }

    public function paint(): void
    {
        if (!$this->state instanceof ClosedDoorState) {
            throw new \RuntimeException('You cannot paint the door');
        }
    }

    public function open(): void
    {
        $this->state = $this->state->open();
    }

    public function close(): void
    {
        $this->state = $this->state->close();
    }

    public function lock(): void
    {
        $this->state = $this->state->lock();
    }

    public function unlock(): void
    {
        $this->state = $this->state->unlock();
    }
}
