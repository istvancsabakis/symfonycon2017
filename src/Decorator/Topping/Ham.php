<?php

namespace Decorator\Topping;

use Decorator\IngredientInterface;
use Money\Money;

class Ham extends ToppingDecorator
{
    public function __construct(IngredientInterface $ingredient)
    {
        parent::__construct($ingredient, Money::EUR(130));
    }

    public function getName(): string
    {
        return 'ham';
    }
}
