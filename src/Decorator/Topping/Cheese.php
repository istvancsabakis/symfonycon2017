<?php

namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Money;

class Cheese extends ToppingDecorator
{
    public function __construct(IngredientInterface $ingredient)
    {
        parent::__construct($ingredient, Money::EUR(105));
    }

    public function getName(): string
    {
        return 'cheese';
    }
}
