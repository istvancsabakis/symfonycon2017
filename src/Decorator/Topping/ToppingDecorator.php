<?php

namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Money;

abstract class ToppingDecorator implements IngredientInterface
{
    private $unitPrice;
    protected $ingredient;

    public function __construct(
        IngredientInterface $ingredient,
        Money $unitPrice
    ) {
        $this->ingredient = $ingredient;
        $this->unitPrice = $unitPrice;
    }

    public function getPrice(): Money
    {
        return $this->unitPrice->add($this->ingredient->getPrice());
    }

    public function getToppings(): array
    {
        return array_merge($this->ingredient->getToppings(), [$this->getName()]);
    }
}
