<?php

namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Money;

class Egg extends ToppingDecorator
{
    public function __construct(IngredientInterface $ingredient)
    {
        parent::__construct($ingredient, Money::EUR(70));
    }

    public function getName(): string
    {
        return 'egg';
    }
}
