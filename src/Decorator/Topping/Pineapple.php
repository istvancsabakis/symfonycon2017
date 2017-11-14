<?php

namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Money;

class Pineapple extends ToppingDecorator
{
    public function __construct(IngredientInterface $ingredient)
    {
        parent::__construct($ingredient, Money::EUR(50));
    }

    public function getName(): string
    {
        return 'pineapple';
    }
}
