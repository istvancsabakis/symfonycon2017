<?php

namespace Decorator;

use Money\Currency;
use Money\Money;

class Pizza implements IngredientInterface
{
    private const RAW = 'raw';
    private const TOMATO = 'tomato';
    private const CREAM = 'cream';

    private $base;
    private $unitPrice;

    private function __construct(string $base, Money $unitPrice)
    {
        $this->base = $base;
        $this->unitPrice = $unitPrice;
    }

    private static function EUR(int $amount): Money
    {
        return new Money($amount, new Currency('EUR'));
    }

    public static function raw(): self
    {
        return new self(self::RAW, self::EUR(190));
    }

    public static function cream(): self
    {
        return new self(self::CREAM, self::EUR(210));
    }

    public static function tomato(): self
    {
        return new self(self::TOMATO, self::EUR(215));
    }

    public function getName(): string
    {
        return $this->base;
    }

    public function getPrice(): Money
    {
        return $this->unitPrice;
    }

    /**
     * @return string[]
     */
    public function getToppings(): array
    {
        if (self::RAW !== $this->base) {
            return [$this->base];
        }

        return [];
    }
}
