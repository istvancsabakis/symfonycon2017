<?php

namespace Flyweight;

final class Boeing777 extends AircraftSeries
{
    public function __construct()
    {
        parent::__construct('Boeing', 'B777', 2);
    }
}
