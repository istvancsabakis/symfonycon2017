<?php

namespace Mediator;

class EventManager implements ConfigurableEventManagerInterface
{
    private $callbacks = [];

    public function listen(string $eventName, callable $callback): void
    {
        if (!isset($this->callbacks[$eventName])) {
            $this->callbacks[$eventName] = [];
        }

        if (!in_array($callback, $this->callbacks[$eventName], true)) {
            $this->callbacks[$eventName][] = $callback;
        }
    }

    public function fire(string $eventName, Event $event): void
    {
        $callbacks = $this->callbacks[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func_array($callback, [$event]);
            if ($event->isStopped()) {
                break;
            }
        }
    }
}
