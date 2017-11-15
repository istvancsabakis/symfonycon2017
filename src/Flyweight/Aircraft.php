<?php

namespace Flyweight;

class Aircraft
{
    private $registrationNumber;
    private $altitude;
    private $aircraftSeries;

    public function __construct(
        AircraftSeries $aircraftSeries,
        string $registrationNumber,
        int $altitude = 0
    ) {
        $this->aircraftSeries = $aircraftSeries;
        $this->altitude = $altitude;
        $this->registrationNumber = $registrationNumber;
    }

    public function getManufacturer(): string
    {
        return $this->aircraftSeries->getManufacturer();
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function getAltitude(): int
    {
        return $this->altitude;
    }

    public function climb(int $feet): void
    {
        $this->altitude+= $feet;
    }

    public function descend(int $feet): void
    {
        $this->altitude-= $feet;
    }
}
