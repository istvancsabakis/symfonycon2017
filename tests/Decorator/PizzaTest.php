<?php

namespace Tests\Decorator;

use Decorator\Pizza;
use Decorator\Topping\Cheese;
use Decorator\Topping\Egg;
use Decorator\Topping\Ham;
use Money\Money;
use PHPUnit\Framework\TestCase;

class PizzaTest extends TestCase
{
    public function testSimpleCreamBasedPizza(): void
    {
        $pizza = new Egg(new Cheese(new Ham(Pizza::cream())));

        $this->assertEquals(Money::EUR(515), $pizza->getPrice());
        $this->assertSame(
            ['cream', 'ham', 'cheese', 'egg'],
            $pizza->getToppings()
        );
    }

    public function testSimpleTomatoBasedPizza(): void
    {
        $pizza = new Egg(new Cheese(new Ham(Pizza::tomato())));

        $this->assertEquals(Money::EUR(520), $pizza->getPrice());
        $this->assertSame(
            ['tomato', 'ham', 'cheese', 'egg'],
            $pizza->getToppings()
        );
    }

    public function testSimpleRawBasedPizza(): void
    {
        $pizza = new Egg(new Cheese(new Ham(Pizza::raw())));

        $this->assertEquals(Money::EUR(495), $pizza->getPrice());
        $this->assertSame(
            ['ham', 'cheese', 'egg'],
            $pizza->getToppings()
        );
    }
}
