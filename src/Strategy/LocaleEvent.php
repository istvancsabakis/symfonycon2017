<?php

namespace Strategy;

use Mediator\Event;

class LocaleEvent extends Event
{
    private $locale;

    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }
}
