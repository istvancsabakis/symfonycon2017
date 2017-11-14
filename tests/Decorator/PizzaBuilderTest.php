<?php

namespace Tests\Decorator;

use Decorator\PizzaBuilder;
use Money\Money;
use PHPUnit\Framework\TestCase;

class PizzaBuilderTest extends TestCase
{
    public function testBakeTomatoBasedPizza(): void
    {
        $pizza = PizzaBuilder::create('tomato')
            ->ham()
            ->cheese()
            ->egg(3)
            ->bake();

        $this->assertEquals(Money::EUR(660), $pizza->getPrice());
        $this->assertSame(
            ['tomato', 'ham', 'cheese', 'egg', 'egg', 'egg'],
            $pizza->getToppings()
        );
    }
}
