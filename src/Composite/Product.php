<?php

namespace Composite;

use Money\Money;
use ValueObject\Mass;

class Product
{
    private $name;
    private $unitPrice;
    private $mass;

    public function __construct(
        string $name,
        Money $unitPrice,
        Mass $mass
    ) {
        $this->name = $name;
        $this->unitPrice = $unitPrice;
        $this->mass = $mass;
    }

    public static function physical(string $name, Money $unitPrice, string $mass): self
    {
        return new self($name, $unitPrice, Mass::fromString($mass));
    }

    public static function digital(string $name, Money $unitPrice): self
    {
        return new self($name, $unitPrice, Mass::fromString('0 g'));
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUnitPrice(): Money
    {
        return $this->unitPrice;
    }

    public function getMass(): Mass
    {
        return $this->mass;
    }
}
