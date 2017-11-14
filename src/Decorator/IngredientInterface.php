<?php

namespace Decorator;

use Money\Money;

interface IngredientInterface
{
    public function getName(): string;

    public function getPrice(): Money;

    /**
     * @return string[]
     */
    public function getToppings(): array;
}
