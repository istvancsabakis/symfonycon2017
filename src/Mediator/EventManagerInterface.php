<?php

namespace Mediator;

interface EventManagerInterface
{
    public function fire(string $eventName, Event $event): void;
}
