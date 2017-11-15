<?php

namespace Mediator;

class NullEventManager implements EventManagerInterface
{
    public function fire(string $eventName, Event $event): void
    {
    }
}
