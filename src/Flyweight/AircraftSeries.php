<?php

namespace Flyweight;

abstract class AircraftSeries
{
    private $manufacturer;
    private $family;
    private $enginesCount;

    public function __construct(
        string $manufacturer,
        string $family,
        int $enginesCount
    ) {
        $this->manufacturer = $manufacturer;
        $this->family = $family;
        $this->enginesCount = $enginesCount;
    }

    private function __clone()
    {
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function getFamily(): string
    {
        return $this->family;
    }

    public function getEnginesCount(): int
    {
        return $this->enginesCount;
    }
}
