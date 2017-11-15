<?php

namespace Flyweight;

final class Airbus380 extends AircraftSeries
{
    public function __construct()
    {
        parent::__construct('Airbus', 'A380', 4);
    }
}
