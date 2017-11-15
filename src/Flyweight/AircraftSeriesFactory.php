<?php

namespace Flyweight;

class AircraftSeriesFactory
{
    private static $series = [];

    private static $supportedSeries = [
        'A380' => Airbus380::class,
        'B777' => Boeing777::class,
    ];

    public function getSeries(string $series): AircraftSeries
    {
        if (isset(static::$series[$series])) {
            return static::$series[$series];
        }

        if (!array_key_exists($series, static::$supportedSeries)) {
            throw new \InvalidArgumentException('Unsupported aircraft series.');
        }

        $class = static::$supportedSeries[$series];

        return static::$series[$series] = new $class();
    }
}
